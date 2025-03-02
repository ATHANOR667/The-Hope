<?php

namespace App\Http\Controllers;

use App\Mail\DonFeedback;
use App\Models\Cause;
use App\Models\Don;
use App\Models\Volontaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use NotchPay\Exceptions\ApiException;
use NotchPay\Exceptions\NotchPayException;
use NotchPay\NotchPay;
use NotchPay\Payment;

class GuestController extends Controller
{
    public function welcome(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $causes = Cause::where('dateClotureContribution', '>', now()) ;
        $realisations = Cause::where('dateClotureContribution', '<', now()) ;
        $causes = $causes->exists() ? $causes->get() : null;
        $realisations = $realisations->exists() ? $realisations->get() : collect();
        return view('Guest.welcome' , compact('causes', 'realisations'));
    }

    public function donate( Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $url = route('guest.welcome').'#section_4' ;
        $apiKey = env('NOTCHPAY_API_KEY');
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'email' => 'required|email',
        ]);

        $cause = Crypt::encrypt($request->input('cause_id') ? $request->input('cause_id') : 1);
        $email = Crypt::encrypt($request->input('email') );
        $nom = Crypt::encrypt($request->input('nom') );
        $prenom = Crypt::encrypt($request->input('prenom') );

        try {
            NotchPay::setApiKey($apiKey);
            $tranx = Payment::initialize([
                'amount' => $request->input('montant'),
                'email' => $request->input('email'),
                'currency' => 'XAF',
                'callback' => route('guest.verify' ,
                    [
                        'cause' => $cause,
                        'email' => $email ,
                        'nom' => $nom,
                        'prenom' => $prenom,
                    ]
                ),
                'reference' => $request->input('email') . '-' . now()->format('d-m-Y-H-i-s'),
            ]);
            return redirect($tranx->authorization_url);

        } catch (NotchPayException $e) {
            return redirect($url)->with('error_', 'Erreur lors de l\'initialisation du paiement : ' . $e->getMessage());
        }
    }

    public function verify(Request $request , string $cause ,string $email , string $nom , string $prenom ): \Illuminate\Http\RedirectResponse
    {
        $url = route('guest.welcome') . '#section_4';


        $apiKey = env('NOTCHPAY_API_KEY');
        try {
            $cause = Cause::find(Crypt::decrypt($cause));
            $email = Crypt::decrypt($email);
            $nom = Crypt::decrypt($nom);
            $prenom = Crypt::decrypt($prenom);
        }catch (\Exception $e){
            Log::error('Erreur lors du déchifrement des data ( cause et email ) Guestcontoller::verify() : ' . $e->getMessage());
        }
        $reference = $request->input('reference');
        if (!$reference) {
            session()->flash('error_', 'Référence non fournie.');
            return redirect($url);
        }

        try {
            NotchPay::setApiKey($apiKey);
            $tranx = Payment::verify($reference);

            if ($tranx->transaction->status === 'complete') {
                $existingTransaction = Don::where('reference', $reference)->first();
                if ($existingTransaction) {
                    return redirect($url)->with('info', 'Cette transaction a déjà été traitée.');
                }

                try {
                    $volontaire = Volontaire::where('email', $email)->first();
                } catch (\Exception $e){
                    Log::error('Don effectué et non enregistré ou mail non envoyé Guestcontoller::verify() :  ' . $e->getMessage());
                }

                try {
                    Don::create([
                        'reference' => $reference ,
                        'montant' => $tranx->transaction->amount,
                        'devise' => $tranx->transaction->currency,
                        'emailDonateur' => $email,
                        'volontaire_id' => $volontaire?->id,
                        'cause_id' => $cause->id,
                        'nom' => $nom,
                        'prenom' => $prenom,
                    ]);

                    Mail::to($email)->send(new DonFeedback(
                        $volontaire?->nom.' '.$volontaire?->prenom,
                        $tranx->transaction->amount ,
                        $cause ,
                        $reference
                    ));

                }catch (\Exception $e){
                    Log::error('Don effectué et non enregistré ou mail non envoyé Guestcontoller::verify() :  ' . $e->getMessage());
                }

                session()->flash('success_' , 'Paiement réussi et traité.');
                return redirect($url);
            } else {
                session()->flash('error_' , 'Paiement échoué.');
                return to_route($url);
            }
        } catch (ApiException $e) {
            session()->flash('error_', 'Erreur lors de la vérification du paiement.');
            Log::error('Erreur lors de la vérification du paiement Guestcontoller ligne 115  : ' . $e->getMessage());
            return to_route($url);
        }
    }
}

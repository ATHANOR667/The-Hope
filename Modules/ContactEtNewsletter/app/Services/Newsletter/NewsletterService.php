<?php

namespace Modules\ContactEtNewsletter\Services\Newsletter;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterDelivery;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;
use Modules\ContactEtNewsletter\Models\Newsletter\Subscriber;
use Throwable;
use Twilio\Exceptions\TwilioException;
use InvalidArgumentException;

class NewsletterService
{
    protected NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Gère l'inscription ou la ré-inscription d'un abonné.
     *
     * @param string $email
     * @param string|null $phone
     * @param array $channels Canaux d'abonnement souhaités
     * @return Subscriber
     * @throws TwilioException
     * @throws Exception
     */
    public function subscribe(string $email, ?string $phone = null, array $channels = ['mail']): Subscriber
    {
        try {
            $subscriber = Subscriber::withTrashed()->firstOrNew(['email' => $email]);

            $wasSoftDeleted = $subscriber->trashed();

            if ($wasSoftDeleted) {
                $subscriber->restore();
            } else {
                $subscriber->save();
            }

            $data = [
                'phone' => $phone,
                'channels' => $channels,
                'is_active' => true,
                'subscribed_at' => $subscriber->subscribed_at ?? now(),
                'unsubscribed_at' => null,
                'deleted_at' => null,
            ];
            $subscriber->fill($data)->save();
            $subscriber=Subscriber::find($subscriber->id);


                $message = NewsletterMessage::where('type', 'welcome')->first();
                if ($message) {
                    $delivery = NewsletterDelivery::create([
                        'subscriber_id' => $subscriber->id,
                        'newsletter_message_id' => $message->id,
                        'channel' => $channels[0] ?? 'mail',
                    ]);

                    $this->sendNewsletterMessage($subscriber, $message, $delivery, $channels);
                }

                return  $subscriber ;

        } catch (Exception $exception) {
            Log::error("erreur dans le subscribe: " . $exception->getMessage(), [
                'email' => $email,
                'trace' => $exception->getTraceAsString()
            ]);
            throw $exception;
        }
    }

    /**
     * Envoie un message de newsletter à un abonné spécifique.
     *
     * @param Subscriber $subscriber (Est maintenant un type 'Authenticatable' pour le NotificationService)
     * @param NewsletterMessage $message
     * @param NewsletterDelivery $delivery
     * @param array|null $channels
     * @throws TwilioException
     * @throws Exception
     */
    public function sendNewsletterMessage(Subscriber $subscriber, NewsletterMessage $message , NewsletterDelivery $delivery , ?array $channels = null): void
    {
        try {
            $effectiveChannels = $channels ?? $subscriber->channels;

            if (empty($effectiveChannels)) {
                $effectiveChannels = ['mail'];
            }

            if (empty($subscriber->phone)) {
                $effectiveChannels = array_diff($effectiveChannels, ['sms', 'whatsapp']);
            }

            if (empty($effectiveChannels)) {
                if ($subscriber->email) {
                    $effectiveChannels = ['mail'];
                } else {
                    throw new InvalidArgumentException("Impossible d'envoyer la newsletter à l'abonné sans email ni téléphone valide.");
                }
            }

            $this->notificationService->send(
                $subscriber,
                $message,
                $delivery,
                $effectiveChannels
            );
        } catch (Exception $e){
            Log::error($e->getMessage());
            $delivery->update([
                'status' => 'failed',
                'error_message' => $e->getMessage()
            ]);
            $delivery->save();
            throw $e;
        }

    }

    /**
     * Gère la désinscription d'un abonné.
     *
     * @param string $email
     * @param string|null $phone
     * @param array $channels Canaux d'abonnement souhaités
     * @return false
     * @throws TwilioException|Throwable
     */
    public function unsubscribe(string $email, ?string $phone = null, array $channels = ['mail']): bool
    {
        try {
            $subscriber = Subscriber::withTrashed()->firstOrNew(['email' => $email]);
            $wasSoftDeleted = $subscriber->trashed();
            $subscriber=Subscriber::find($subscriber->id);


            if ($wasSoftDeleted) {
                $subscriber->restore();
                return  false ;
            } else {
                DB::transaction(function () use ($subscriber, $channels) {

                    $message = NewsletterMessage::where('type', 'goodbye')->first();
                    if (!$message) {
                        throw new Exception("Message de bienvenue introuvable.");
                    }

                    $delivery = NewsletterDelivery::create([
                        'subscriber_id' => $subscriber->id,
                        'newsletter_message_id' => $message->id,
                        'channel' => $channels[0] ?? 'mail',
                    ]);

                    $this->sendNewsletterMessage($subscriber, $message, $delivery, $channels);

                    $subscriber->update([
                        'is_active' => false
                    ]);
                    $subscriber->save();
                    $subscriber->delete();
                });
            }


            return  true ;

        } catch (Exception $exception) {
            Log::error("erreur dans le subscribe: " . $exception->getMessage(), [
                'email' => $email,
                'trace' => $exception->getTraceAsString()
            ]);
            throw $exception;
        }
    }
}

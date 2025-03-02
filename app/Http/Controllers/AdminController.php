<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function accueil( ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|string|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $admin = Auth::guard('admin')->user();
        }catch (\Exception $exception){
            return \Error::class ;
        }
        return view('Admin.Pages.accueil',[
            'a' => $admin
        ]);
    }


    public function profil(): string|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View
    {
        try {
            $admin = Auth::guard('admin')->user();
        }catch (\Exception){
            return \Error::class ;
        }

        if($admin->email == null){
            $default = true ;
        }else{
            $default = false ;
        }

        return view('Admin.Pages.profil',[
            'a'=>$admin,
            'default' => $default
        ]);
    }




    public function causeShow(string $cause): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|string|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $cause = Cause::withTrashed()
                ->where('id',$cause)
                ->firstOrFail();
        }catch (\Exception|\TypeError $exception){
            Log::error($exception);
            $this->showException($exception);
        }
        return view('Admin.Pages.causeShow',[
            'a' => $cause,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Modules\ContactEtNewsletter\Models\NewsletterDelivery;

class VisitorController extends Controller
{
    public function accueil()
    {
        return view('visitor.pages.accueil',[
            'layoutContent' => $this->getLayout()
        ]) ;
    }

    public function login()
    {
        return view('visitor.pages.login',[
            'layoutContent' => $this->getLayout()
        ]) ;
    }

    public function donate()
    {
        return view('visitor.pages.donate',[
            'layoutContent' => $this->getLayout()
        ]) ;
    }

    public function contact()
    {
        return view('visitor.pages.contact',[
            'layoutContent' => $this->getLayout()
        ]) ;
    }

    public function galerie()
    {
        return view('visitor.pages.galerie',[
            'layoutContent' => $this->getLayout()
        ]) ;
    }



    public function getLayout() : HomeContent
    {
        return HomeContent::first();
    }


}

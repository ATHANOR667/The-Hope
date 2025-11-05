<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function __construct()
    {

        $this->middleware(['permission:customs-logs,admin'])->only(['logsDashboardView']);

    }

    public function profileView(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('admin.pages.profile',
            [
                'admin' => Auth::guard('admin')->user(),
            ]);
    }

    public function logsDashboardView(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('admin.pages.logs',
            [
                'admin' => Auth::guard('admin')->user(),
            ]);

    }

    public function galerieView(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('admin.pages.galerie',
            [
                'admin' => Auth::guard('admin')->user(),
            ]);

    }

    public function manageHomePageView(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('admin.pages.manage-home-page',
            [
                'admin' => Auth::guard('admin')->user(),
            ]);

    }

    public function messagesEtNewsletterView(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('admin.pages.messages-et-newsletter',
            [
                'admin' => Auth::guard('admin')->user(),
            ]);

    }
    
    public function finances(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('admin.pages.finances',
            [
                'admin' => Auth::guard('admin')->user(),
            ]);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Enums\AppPermissions;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:'.AppPermissions::ManageHome->value.',admin'])->only(['manageHomePage']);
    }

    public function manageHomePage()
    {
        return view('admin.manage-home-page',[
            'admin' => Auth::guard('admin')->user(),
        ]);
    }
}

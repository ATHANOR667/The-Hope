<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Modules\AdminBase\Events\BuildingSidebar;

class RegisterHomePageManagementToAdminMenu
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BuildingSidebar $event): void
    {
        $event->add(
            [
                'label' => 'Gestion Page d\'accueil visiteur',
                'route' => 'manageHomePage',
                'icon'  => 'heroicon-o-home',
                'order' => 10,
            ]
        );
    }
}

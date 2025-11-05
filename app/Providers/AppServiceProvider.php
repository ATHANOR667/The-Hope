<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Services\PSP\ExchangeApi;
use App\Services\PSP\NotchpayService;
use App\Services\PSP\StripeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Relation::enforceMorphMap([
            'admin' => 'Modules\AdminBase\Models\Admin',
            'system' => 'Modules\AdminBase\Models\System',
            'super-admin' => 'Modules\AdminBase\Models\SuperAdmin',
            'permission' => 'Spatie\Permission\Models\Permission',
            'role' => 'Spatie\Permission\Models\Role',

            'user-connection-log' => 'Modules\AdminBase\Models\UserConnectionLog',
            'model-activity-log' => 'Modules\AdminBase\Models\ModelActivityLog',

            'post' => 'Modules\GalerieModule\Models\Post',
            'media' => 'Modules\GalerieModule\Models\Media',
            'comment' => 'Modules\GalerieModule\Models\Comment',

            'newsletterMessage' => 'Modules\ContactEtNewsletter\Models\NewsletterMessage',
            'newsletterSubscriber' => 'Modules\ContactEtNewsletter\Models\Subscriber',
            'newsletterDelivery'=> 'Modules\ContactEtNewsletter\Models\NewsletterDelivery',

            'message' => 'Modules\ContactEtNewsletter\Models\Messaging\Message' ,
            'contact' => 'Modules\ContactEtNewsletter\Models\Messaging\Contact',
            'conversation' => 'Modules\ContactEtNewsletter\Models\Messaging\Conversation',

            'faq' => 'Modules\ContactEtNewsletter\Models\Faq'
        ]);

       Gate::define('viewPulse', function (?Authenticatable $user) {
            Log:info($user);
            dd($user);
            return $user  &&
                $user->can('use-pulse');
       });
    }

}

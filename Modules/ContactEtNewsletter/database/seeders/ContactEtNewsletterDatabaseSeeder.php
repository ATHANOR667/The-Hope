<?php

namespace Modules\ContactEtNewsletter\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ContactEtNewsletter\Models\NewsletterDelivery;
use Modules\ContactEtNewsletter\Models\NewsletterMessage;

class ContactEtNewsletterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            NewsletterMessageSeeder::class
        ]);
    }
}

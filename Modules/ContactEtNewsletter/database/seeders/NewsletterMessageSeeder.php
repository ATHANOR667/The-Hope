<?php

namespace Modules\ContactEtNewsletter\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ContactEtNewsletter\Models\Newsletter\NewsletterMessage;

class NewsletterMessageSeeder extends Seeder
{
    public function run(): void
    {
        [
            NewsletterMessage::create([
                'title' => 'Bienvenue dans notre newsletter',
                'content' => 'Inscription réussie, bienvenue dans notre communauté.
                 Vous recevrez ici nos actualités et verrez au quotidien l\'impact de nos actions sur le terrain.',
                'type' => 'welcome',
                'sent_at' => now(),
            ]) ,


            NewsletterMessage::create([
                'title' => 'Désolé de vous voir partir',
                'content' => 'Nous sommes heureux du temps passé à vos cotés et sommes désolé de vous voir partir.
                Notre newsletter rete à portée de clic et nous vous invitons à nous faire savoir ce qui vous a amené
                à vous désinscrire en nous laissant un message. Merci à vous.',
                'type' => 'goodbye',
                'sent_at' => now(),
            ]) ,
        ];
    }
}

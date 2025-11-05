<?php

namespace Database\Seeders;

use App\Models\HomeContent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HomeContent::create([
            'meta' => [
                'description' => 'The Hope Charity - Aider ceux qui en ont besoin avec compassion et engagement. Votre don fait la différence.' ,
                'keywords' => 'charity, donation, hope, non-profit, aide humanitaire, bénévolat, causes' ,
                'author' => 'The Hope Charity' ,

                'og:title' => 'The Hope Charity' ,
                'og:description' => 'Aider ceux qui en ont besoin avec compassion et engagement. Votre don fait la différence.' ,
                'og:image' => url('images/work/logoInitial.jpg') ,
                'og:image:width' => '1200' ,
                'og:image:height' => '630' ,

                'image/x-icon' => url('favicon.ico') ,
                'image/png' => url('images/work/logoInitial.jpg') ,
                'apple-touch-icon' => url('images/work/logoInitial.jpg') ,

                'title' => 'The Hope Charity' ,
                'image' => url('images/work/logoInitial.jpg') ,
            ],

            'hero' => [
                'video_title' => 'Bâtir l\'Espoir, Transformer l\'Avenir',

                'video_url' => 'https://www.youtube.com/embed/KBaM03WrTgo?controls=0&rel=0&autoplay=1&mute=1&loop=1&playlist=KBaM03WrTgo&enablejsapi=1',

            ],

            'founders' => [
                [
                    'name' => 'Alexandre Dubois',
                    'role' => 'Président & Co-Fondateur',
                    'media_type' => 'image',
                    'media_src' => url('images/slide/img2.jpg'),
                    'quote' => 'Convaincu que chaque petite action engendre une vague de changement, mon engagement est total pour la dignité humaine. Il faut agir maintenant.',
                    'bio' => 'Expert en développement durable et gestion de l\'innovation sociale, Alexandre apporte une décennie d\'expérience pointue dans la gestion de projets humanitaires internationaux complexes. Sa vision stratégique assure que l\'organisation reste à la pointe de l\'efficacité et de l\'impact sur le long terme.',
                    'expertise' => 'Développement Durable & Stratégie d\'Aide Humanitaire.',
                    'zone_d_intervention' => 'Afrique de l\'Ouest, Asie du Sud-Est et Moyen-Orient.',
                    'realisation' => 'Lancement et supervision de 5 programmes majeurs d\'accès à l\'eau potable.',
                    'socials' => [
                        ['icon' => 'fab fa-linkedin', 'url' => 'https://linkedin.com/in/alexandre-hope-charity'],
                        ['icon' => 'fab fa-x-twitter', 'url' => 'https://twitter.com/AlexandreHope'],
                    ],
                ],
            ],

            'social_links'  => [
                'facebook' => 'https://www.facebook.com/share/15uBaaEqe8/?mibextid=wwXIfr',
            ]
        ]);
    }
}

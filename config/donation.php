<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Payment Service Providers (PSP) Configuration
    |--------------------------------------------------------------------------
    |
    | Activer ou désactiver les passerelles de paiement depuis l'interface admin.
    | Ces valeurs sont modifiables dynamiquement via le composant DonationAdmin.
    |
    */

    'psp' => [
        'stripe' => [
            'enabled' => false,
        ],
        'notchpay' => [
            'enabled' => true,
        ],
    ],

];

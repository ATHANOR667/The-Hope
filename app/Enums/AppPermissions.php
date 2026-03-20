<?php

namespace App\Enums;

enum AppPermissions: string
{
    case ManageHome = 'gérer page accueil';

    public function requiresPasscode(): bool
    {
        return match($this) {
            self::ManageHome => true,
        };
    }

    public function category(): string
    {
        return 'application';
    }

    public function guard(): string
    {
        return 'admin';
    }
}

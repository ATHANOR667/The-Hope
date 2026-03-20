<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\AppPermissions;
use Spatie\Permission\Models\Permission;

class AppPermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (AppPermissions::cases() as $permEnum) {
            Permission::firstOrCreate(
                [
                    'name' => $permEnum->value,
                    'guard_name' => $permEnum->guard(),
                ],
                [
                    'categorie' => $permEnum->category(),
                    'requires_passcode' => $permEnum->requiresPasscode(),
                ]
            );
        }
    }
}

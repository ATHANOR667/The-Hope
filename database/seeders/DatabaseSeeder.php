<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Cause;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        Admin::create([
            'email' => null ,
            'password' => bcrypt('0000')
        ]);

        Cause::create([
            'titre' => 'Caisse de prévoyance' ,
            'description' => 'Les montants ici versés servent de base a toute action menée par l\'association' ,
            'effectif'=>0 ,
            'admin_id'=>1
        ]);
    }
}

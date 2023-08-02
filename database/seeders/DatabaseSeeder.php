<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CategoriePathologie;
use App\Models\Pharmacie;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        CategoriePathologie::factory(5)->create();
        Pharmacie::factory(3)->create();
        Produit::factory(5)->create();
        
        
    }
}

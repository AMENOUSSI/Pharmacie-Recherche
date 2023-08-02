<?php

namespace Database\Factories;

use App\Models\CategoriePathologie;
use App\Models\Pharmacie;
use App\Models\Produit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
            return [
                'nom' => $this->faker->name(),
                'prix' =>$this->faker->randomFloat(2, 10, 1000),
                'categorie_pathologie_id' =>CategoriePathologie::all()->random()->id,
                'pharmacie_id' => Pharmacie::all()->random()->id,
              
            ];
        
    }
}

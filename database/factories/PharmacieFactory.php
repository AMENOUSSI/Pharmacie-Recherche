<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacie>
 */
class PharmacieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
            return [
                'nom' =>$this->faker->name,
                'region' =>$this->faker->word(),
                'prefecture' =>$this->faker->word(),
                'telephone' =>$this->faker->phoneNumber(),
                
            ];
   
    }
}

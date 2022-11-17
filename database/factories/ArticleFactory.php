<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $etudiants = User::select('id')->get();
        $idEtudiant = array();
        
        for ($i=0; $i < count($etudiants) ; $i++) { 
            $idEtudiant [] = $etudiants[$i]['id'];
        }
        $random = array_rand($idEtudiant);
        
        return [
            'titre' => $this->faker->sentence(2),
            'titre_fr' => $this->faker->sentence(2),
            'contenu' => $this->faker->sentence(50),
            'contenu_fr' => $this->faker->sentence(50),
            'user_id' => $random

        ];
    }
}


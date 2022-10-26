<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $villes = Ville::select('id')->get();
        $newVille = array();
        $ville = $villes;
        for ($i=0; $i < count($villes) ; $i++) { 
            $newVille [] = $villes[$i]['id'];
        }
        $random = array_rand($newVille);

        return [
           
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->email,
            'dateDeNaissance' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'phone' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
            'ville_id' => $random
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [

        'nom', 'prenom', 'email', 'adresse', 'phone','dateDeNaissance','ville_id'
        
    ];

    public function EtudiantVille (){

        return $this->hasOne('App\Models\Ville', 'id' ,'ville_id');

    }
    
}

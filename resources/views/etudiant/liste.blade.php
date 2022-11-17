@extends('layouts.app')
@section('content') 


    <div class="container">
        <div class="row mt-5 pb-5">
            <h3 class="display-5">Collège {{ config('app.name') }}</h3>
            <hr>
            <div class="card">
                <div class="card-header">
                    <h1>Liste des etudiants </h1>
                </div>
                <div class="card-body">
                    @forelse($etudiants as $etudiant) 
                        <ul class=""> 
                            <li class=""><a href="{{ route('show', $etudiant->id) }}"> {{ ucfirst($etudiant->nom) }}, {{ ucfirst($etudiant->prenom) }}</a></li> 
                        </ul>
                    @empty
                        <p class="text-warning">Aucun article de blog disponible </p>
                    @endforelse
                </div>
            </div>
            {{$etudiants}}
        </div>
    </div>



@endsection
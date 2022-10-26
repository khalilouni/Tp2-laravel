@extends('layouts.app')
@section('content')

<div class="container mt-5">

    <div class="card ">
      <h5 class="card-header">TP1- site web dynamique en utilisant le cadriciel Laravel</h5>
      <div class="card-body">
        <p class="card-text">Ce site represente mon premier projet CRUD avec le Framework Laravel <br>
        il permet de consulter la liste des etudiants de college maisonneuve <br>
        et d'ajouter, de modifier ou de supprimer un etudiant <br>
        et d'acceder a une fiche etudiant.

        </p>
        <a href="{{ route('index') }}" class="btn btn-success">Acceder a la liste</a>
      </div>
    </div>

</div>


@endsection
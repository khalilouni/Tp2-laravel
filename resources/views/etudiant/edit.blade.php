@extends('layouts.app')
@section('content') 

<div class="container">
        <form action="" method="POST" class="mt-5">
            @csrf
            @method('PUT')
            <div class="row mb-3 mt-2">
                <label for="email" class="col-sm-1 col-form-label" >Email  </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{!! $etudiant->email !!}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
                <label for="nom" class="col-sm-1 col-form-label">Nom </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" value="{!! $etudiant->nom !!}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
                <label for="prenom" class="col-sm-1 col-form-label">Prenom </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="prenom" value="{!! $etudiant->prenom !!}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
                <label for="adresse" class="col-sm-1 col-form-label">Adresse </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="adresse" value="{!! $etudiant->adresse !!}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
                <label for="phone" class="col-sm-1 col-form-label">Phone </label>
                <div class="col-sm-10">
                    <input type="phone" class="form-control" name="phone" value="{!! $etudiant->phone !!}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
                <label for="dateDeNaissance" class="col-sm-1 col-form-label">Adresse </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dateDeNaissance" value="{!! $etudiant->dateDeNaissance !!}">
                </div>
            </div>

            
            <div class="row mb-3 mt-2">

                <label for="ville_id" class="col-sm-1 col-form-label">Ville </label>
                <div class="col-sm-10">
                    <select class="custom-select form-control" name="ville_id">
                        
                        <option  value="0">Selectionner une ville</option>
                        @foreach($villes as $ville)
                            <option  value="{{ $ville->id }}" class="form-control">{{ $ville->nomVille }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            
            <div class="d-flex justify-content-around">
                <input type="submit" class="btn btn-success " value="Modifier">
                <a href="{{ route('index') }}" class="btn btn-outline-danger">Retourner</a> 

            </div>
        </form>

</div>




@endsection
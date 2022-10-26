@extends('layouts.app')
@section('content') 
<div class="container"> 
    <div class="row mt-5"> 
        <div class="col-12 "> 
            
            <p><strong>Nom : </strong> {!! $etudiant->nom !!}</p> <hr> 
            <p><strong>Prenom :</strong>  {!! $etudiant->prenom !!}</p> <hr>
            <p> <strong>Date de naissance :</strong> {!! $etudiant->dateDeNaissance !!}</p> <hr>
            <p><strong>Adresse :</strong> {!! $etudiant->adresse !!}</p> <hr>
            <p><strong>Phone :</strong> {!! $etudiant->phone !!}</p> <hr>
            <p><strong>Email :</strong> {!! $etudiant->email !!}</p> <hr>
            <p><strong>Ville :</strong> {!! $etudiant->EtudiantVille->nomVille !!}</p> <hr>
            <div class="d-flex justify-content-around">
                <a href="{{ route('index') }}" class="btn btn-success">Retourner</a> 
                <a href="/edit/{{ $etudiant->id }}" class="btn btn-success">Modifier</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
        
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Vouler vous vraiment effacer {!! $etudiant->nom !!} {!! $etudiant->prenom !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        

                    <form action="{{ route('delete', $etudiant->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </form>
            </div>
        </div> 
    </div> 
</div>
@endsection
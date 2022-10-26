@extends('layouts.app')
@section('content') 

<div class="container"> 
    
    <div class="jumbotron mt-5 pt-5">
        <h1 class="display-4">Collège {{ config('app.name') }}</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <a class="btn btn-outline-success btn-lg"  href="{{ route('index') }}" role="button">Liste des etudiants</a>
    </div>
</div>

@endsection
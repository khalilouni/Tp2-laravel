@extends('layouts.app')
@section('content') 

<div class="container">
        <form action="{{ route('store') }}" method="POST" class="mt-5 text-light">
            @csrf
          
            <div class="row mb-3 mt-2">
            @if($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
                <label for="email" class="col-sm-1 col-form-label">Email  </label>
                <div class="col-sm-10">
                
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
            @if($errors->has('nom'))
                <div class="text-danger">{{ $errors->first('nom') }}</div>
            @endif
                <label for="nom" class="col-sm-1 col-form-label">Nom </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" value="{{old('nom')}}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
            @if($errors->has('prenom'))
                <div class="text-danger">{{ $errors->first('prenom') }}</div>
            @endif
                <label for="prenom" class="col-sm-1 col-form-label">Prenom </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="prenom" value="{{old('prenom')}}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
            @if($errors->has('adresse'))
                <div class="text-danger">{{ $errors->first('adresse') }}</div>
            @endif
                <label for="adresse" class="col-sm-1 col-form-label">Adresse </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="adresse" value="{{old('adresse')}}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
            @if($errors->has('phone'))
                <div class="text-danger">{{ $errors->first('phone') }}</div>
            @endif
                <label for="phone" class="col-sm-1 col-form-label">Phone </label>
                <div class="col-sm-10">
                    <input type="phone" class="form-control" name="phone" value="{{old('phone')}}">
                    </div>
            </div>
            <div class="row mb-3 mt-2">
            @if($errors->has('dateDeNaissance'))
                <div class="text-danger">{{ $errors->first('dateDeNaissance') }}</div>
            @endif
                <label for="dateDeNaissance" class="col-sm-1 col-form-label">Adresse </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="dateDeNaissance" value="{{old('dateDeNaissance')}}">
                </div>
            </div>

            
            <div class="row mb-3 mt-2">

                <label for="ville_id" class="col-sm-1 col-form-label">Ville </label>
                <div class="col-sm-10">
                    @if($errors->has('ville_id'))
                        <div class="text-danger">{{ $errors->first('ville_id') }}</div>
                    @endif
                    <select class="custom-select form-control" name="ville_id">
                        
                        <option  value="">Selectionner une ville</option>
                        @foreach($villes as $ville)
                            <option  value="{{ $ville->id }}" class="form-control">{{ $ville->nomVille }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="d-flex justify-content-around">
                <input type="submit" class="btn btn-outline-success" value="Ajouter">
                <a href="{{ route('liste.article') }}" class="btn btn-outline-danger">Retourner</a> 
                
            </div>
            
        </form>

</div>




@endsection
@extends('layouts.app')
@section('content')


<div class="container">
    <form class="m-5 text-light login-form" method="post" action="">
            
            @csrf
            @method('PUT')
            @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <h1>@lang('lang.document-ajouter')</h1>
                </div>
            @endif
            <h1 class="py-3">@lang('lang.document-ajouter')</h1>
            <div class="row mb-3 mt-2">
            <label for="titre" class="col-sm-1 col-form-label">Titre anglais</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="titre"  placeholder="Title of Paper" value="{{$document->titre}}">
            </div>
            </div>
            <div class="row mb-3 mt-2">
            <label for="titre_fr" class="col-sm-1 col-form-label">Titre francais</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="titre_fr"  placeholder="Title of Paper" value="{{$document->titre_fr}}">
            </div>
            </div>
           
            <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary m-lg-1"  href="{{ route('document.liste') }}">Retour</a>
            </div>
    </form>
</div>






@endsection
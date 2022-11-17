@extends('layouts.app')
@section('content')



<div class="container ">
        
        <form action="{{ route('store.article') }}" method="POST" class="m-5 text-light">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif
            <h1 class="py-3">@lang('lang.ajouter-article')</h1>

            <div class="row mb-3 mt-2">
                
                <label for="titre_fr" class="col-sm-1 col-form-label">@lang('lang.title') </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="titre_fr" value="">
                </div>

            </div>
            
            <div class="row mb-3 mt-2">
           
                <label for="contenu" class="col-sm-1 col-form-label">@lang('lang.content_fr')</label>
                <div class="col-sm-10">
                    <textarea name="contenu_fr" class="form-control"  rows="5"></textarea>
                </div>

            </div>
            
            <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
            
            <div class="row mb-3 mt-2">
                
                <label for="titre" class="col-sm-1 col-form-label">@lang('lang.title') </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="titre" value="">
                </div>

            </div>
            <div class="row mb-3 mt-2">
           
                <label for="contenu" class="col-sm-1 col-form-label">@lang('lang.content_en')</label>
                <div class="col-sm-10">
                    <textarea name="contenu" class="form-control" rows="5"></textarea>
                </div>

            </div>
            <div class="d-flex justify-content-around">
                <input type="submit" class="btn btn-outline-success" value="@lang('lang.submit')">
                <a href="{{ route('liste.article') }}" class="btn btn-outline-danger">@lang('lang.retour')</a> 
            </div>
            
        </form>

</div>


@endsection
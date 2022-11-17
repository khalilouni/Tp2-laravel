<!DOCTYPE html>
<html lang="en"> 
  <head> 
    <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swrel=">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    
   <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>

  </head>
 <body class="d-flex flex-column min-vh-100 bg-dark">
    @php $locale = session()->get('locale'); @endphp
    @php $privilege = session()->get('user_privilege'); @endphp
    <nav class="navbar navbar-expand-lg bg-light">
      
      <div class="container-fluid">
        
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
         
          <div class="collapse navbar-collapse navbar-nav" id="navbarNavAltMarkup">

            <h4 class="d-inline p-2  ">@lang('lang.text_hello')  @if(Auth::check()) {{Auth::user()->name}} @else Guest  @endif</h4>
            @guest
            <a class="nav-link" href="{{ route('createUsager') }}">@lang('lang.register')</a>
            <a class="btn btn-primary m-lg-1"  href="{{ route('login') }}">@lang('lang.login')</a>
            @else
            <a class="nav-link" href="{{ route('liste.article') }}">@lang('lang.posts')</a>
            <a class="nav-link" href="{{ route('document.liste') }}">Document</a>
            <a class="nav-link" href="{{ route('logout') }}">@lang('lang.logout')</a>
            <a class="btn btn-primary m-lg-1"  href="{{ route('create.article') }}">@lang('lang.ajouter-article')</a>
            @endguest
          </div>
          <div class="navbar-nav">
          @if($privilege=='admin')
            <a class="nav-link" href="{{ route('liste.etudiant') }}" >@lang('lang.etudiant-liste')</a>
            <a class="nav-link" href="{{ route('create') }}" >@lang('lang.ajout-etudiant')</a>
            @endif
            <a class="nav-link" href="{{ route('about') }}" >@lang('lang.about')</a>
            <a class="nav-link @if($locale=='fr') bg-warning @endif" href="{{ route('lang', 'fr') }}"><img src="{{asset('images/flag/fr.png')}}" ></a>
            <a class="nav-link @if($locale=='en') bg-warning @endif"  href="{{ route('lang', 'en') }}"><img src="{{asset('images/flag/en.png')}}" ></a>
            
           
          </div>
        </div>
    </nav>
   
   @yield('content')

  
   @extends('layouts.footer')
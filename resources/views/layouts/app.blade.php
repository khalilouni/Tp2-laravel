<!DOCTYPE html>
<html lang="en"
> <head
> <meta charset="utf-8"
> <meta name="viewport" content=
"width=device-width, initial-scale=1"
>
 <title>{{ config('app.name') }}</title
>
<!-- Fonts -->
 <!-- <link href=
"https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swrel="stylesheet"> <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css
" crossorigin="anonymous" integrity="
sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU
" rel="stylesheet" > -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

 </head>
 <body>
    <nav class="navbar navbar-expand-lg " style="background-color: #23254C; color:white;">
      <div class="container-fluid">
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="{{ route('index') }}" style="color:white;">Home</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}" style="color:white;">About</a>
            </li>
            
          </ul>
            <a class="btn btn-success m-lg-1" style="color:white;" href="{{ route('create') }}" role="button">Ajouter un etudiant</a>
            
        </div>
      </div>
    </nav>
    

   @yield('content')

      <footer class="text-center text-light fixed-bottom " style="background-color: #23254C; color:white;">
     
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center  p-3" style="color:white;" >
        © 2022 Copyright:
        <a class="" style="color:white;" href="https://mdbootstrap.com/" >MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>

 </body> 


 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="
sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ
" crossorigin="anonymous"></script> -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</html>
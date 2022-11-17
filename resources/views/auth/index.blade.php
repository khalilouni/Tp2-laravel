@extends('layouts.app')
@section('content')
<main class="login-form">
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-5 my-5">
                <div class="card">
                    <h3 class="card-header text-center">@lang('lang.login')</h3>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors)
                            <ul class=""> 
                                @foreach($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('authentification')}}" method="POST">
                            @csrf 
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"  autofocus>
                               
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password"  autofocus>
                                
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">@lang('lang.login')</button>
                            </div>
                            <div class="text-center mt-2">
                                <p>@lang('lang.notMember') <a href="{{ route('createUsager') }}">@lang('lang.register')</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

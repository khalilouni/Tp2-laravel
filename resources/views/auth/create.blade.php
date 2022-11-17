@extends('layouts.app')
@section('content')


<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h6 class="card-header text-center">@lang('lang.register_user')</h6>
                    @if(session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('errors')->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    @endif
                    <div class="card-body">
                    
                        
                        
                        <form action="{{ route('registration')}}" method="POST">
                            @csrf 
                            <div class="form-group mb-3">
                                <label for="">@lang('lang.name') :</label>
                                <input type="text" placeholder="" id="name" class="form-control" name="name" value="{{old('name')}}">
                                
                                
                            </div>
                            <div class="form-group mb-3">
                            <label for="">@lang('lang.email') :</label>
                                <input type="text"  id="email" class="form-control" name="email"  value="{{old('email')}}" autofocus>
                                
                            </div>
                            <div class="form-group mb-3">
                                <label for="">@lang('lang.password') :</label>
                                <input type="password"  id="password" class="form-control" name="password"  >
                                
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block">@lang('lang.register')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
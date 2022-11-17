@extends('layouts.app')
@section('content')

<div class="container mt-5">

    <div class="card ">
        <h5 class="card-header">@lang('lang.title-about')</h5>
        <div class="card-body">
          <p class="card-text">@lang('lang.text-about')</p>
          <a href="{{ route('liste.article') }}" class="btn btn-primary">@lang('lang.liste')</a>
        </div>
    </div>

</div>


@endsection
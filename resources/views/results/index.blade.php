@extends('layouts/frontend')
@section('nav')
  {{-- @include('includes.invoices-nav') --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-test">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-home"></i>
              <br>
              ADMIN-HOME
            </a>
          </li>
        </ul>
      </div>
  </nav>
@endsection
@section('nav-title')
RESULTAAT
@endsection
@section('main-content')
    <div class="container results-container">
        <div class="row">
            <div class="offset-1"></div>
            <div class="col-sm-5 text-center">
                <i class="fas fa-globe-europe"></i>
                <br>
                <a href="/results/global">Globaal resultaat</a>
            </div>
            <div class="col-sm-5 text-center">
                <i class="fas fa-id-card"></i>
                <br>
                <a href="/results/client">Resultaat per klant</a>
            </div>
    </div>
    
@endsection
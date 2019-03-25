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
          <a class="nav-link" href="{{route('contacten.contacts')}}">
                <i class="fas fa-backward"></i>
            <br>
            TERUG NAAR OVERZICHT
          </a>
        </li>
      </ul>
    </div>
</nav>
@endsection
@section('nav-title')
Voeg contact toe
@endsection
    
@section('main-content')
  <form action="{{ route('contacts.store') }}" method="post">
        {{ csrf_field() }}

<div class="container create-contact">
        <div class="row">
                <div class="col-sm-2">
                    Naam:
                </div>
                <div class="col-sm-10">
                        <input class="form-control" type="text" id="naam" name="naam">
                        @if($errors->has('naam'))
                 <span class="error">
                     {{ $errors->first('naam') }}
                 </span>
                 @endif
                </div>
        </div>
                <div class="row">
                        <div class="col-sm-2">
                            Straat:
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="straat" name="straat">
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-2">
                            <label for="nummer_bus">Nummer/bus:</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="nummer_bus" name="nummer_bus" ">
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-2">
                                <label for="postcode">Postcode:</label>
                        </div>
                        <div class="col-sm-10">
                                
        <input class="form-control" type="text" id="postcode" name="postcode" ">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                            <label for="gemeente">Gemeente:</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="gemeente" name="gemeente" ">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                            <label for="telefoon">Telefoon:</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="telefoon" name="telefoon" ">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                            <label for="email">E-mail:</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="email" name="email" ">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                                <label for="btw_nummer">BTW nummer:</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="btw_nummer" name="btw_nummer" ">
               @if($errors->has('btw_nummer'))
        <span class="error">
            {{ $errors->first('btw_nummer') }}
        </span>
        @endif
                        </div>
                </div>
                 <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="submit" class="form-control form-control-lg"> VOEG  TOE</button>
            </div>
        </div>
</div>
  </form>



@endsection
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
        <li class="nav-item active">
            <a class="nav-link" href="{{route('contacts.create')}}">
              <i class="fas fa-plus"></i>
              <br>
              CONTACT TOEVOEGEN
            </a>
        </li>
    </div>
</nav>
@endsection
@section('nav-title')
{{ $contact->naam }}
@endsection
@section('main-content')
    <div class="container border contact-card">
        <div class="row">
            <div class="offset-3"></div>
            <div class="col-sm-2">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="col-sm-4">
                <a href="mailto:{{ $contact->email }}">
                    {{ $contact->email }}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="offset-3"></div>
            <div class="col-sm-2">
                <i class="fas fa-phone-volume"></i>
            </div>
            <div class="col-sm-4">
                <a href="tel:{{ $contact->telefoon }}">
                    {{ $contact->telefoon }}
                </a>
            </div>
        </div>
        <div class="row">
                <div class="offset-3"></div>
                <div class="col-sm-2">
                    <i class="fas fa-building"></i>
                </div>
                <div class="col-sm-4">
                    {{$contact->straat}} {{$contact->nummer_bus}} 
                    <br>
                    {{$contact->postcode}} -{{$contact->gemeente}} 
                    <br>
                    <a href="https://www.google.com/maps/place/{{$contact->straat}}+{{$contact->nummer_bus}},+{{$contact->postcode}}+{{$contact->gemeente}} /" class="google-map-link">Route</a>
                </div>
            </div>
            <div class="row">
                    <div class="offset-3"></div>
                    <div class="col-sm-2">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="col-sm-4">
                        {{ $contact->btw_nummer }}
                    </div>
            </div>
            <div class="row border-top">
                <div class="offset-4"></div>
                <div class="col-sm-2 text-center">
                        
                        <a href="{{ route('contacten.edit', $contact->id) }}"><i class="fas fa-pen-nib"></i></a>
                </div>
                <div class="col-sm-2 text-center">
                        <a href="{{ route('contacts.delete', $contact->id) }}" ><i class="fas fa-trash-alt"></i></a> 
                        
                </div>
            </div>
    </div>
@endsection
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
OVERZICHT CONTACTEN
@endsection
@section('main-content')
<div class="container-fluid contacts-overview border-top">
        <div class="row text-light">
                <div class="col-sm-3">
                    NAAM
                </div>
                <div class="col-sm-3">
                    E-MAIL
                </div>
                <div class="col-sm-3">
                    TELEFOON
                </div>
                <div class="col-sm-3">
                    MEER
                </div>
            </div>
    @foreach($contacts as $contact)
        <div class="row border-bottom">
            <div class="col-sm-3">
                   {{ $contact->naam }}
            </div>
            <div class="col-sm-3">
                <a href="mailto:{{ $contact->email }}">
                    {{ $contact->email }}
                </a>
            </div>
            <div class="col-sm-3">
                <a href="tel:{{ $contact->telefoon }}">
                    {{ $contact->telefoon }}
                </a>
            </div>
            <div class="col-sm-3">
                <a href="{{ route('contacten.show', $contact->id) }}"> 
                    <i class="fas fa-info-circle"></i>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection


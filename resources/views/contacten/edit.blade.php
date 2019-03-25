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
    </div>
</nav>
@endsection
@section('nav-title')
PAS {{$contact->naam}} AAN
@endsection
@section('main-content')
<form action="{{ route('contacts.update', $contact->id )}}" method="post" class="create-edit-form">
    {{ csrf_field() }}
    @include('contacten.form')
    <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="submit" class="form-control form-control-lg">UPDATE CONTACT</button>
            </div>
        </div>

</form>
@endsection
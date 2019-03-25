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
          <a class="nav-link" href="{{route('invoices')}}">
                <i class="fas fa-backward"></i>
            <br>
            TERUG NAAR OVERZICHT
          </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('invoices.create')}}">
              <i class="fas fa-plus"></i>
              <br>
              FACTUUR TOEVOEGEN
            </a>
        </li>
    </div>
</nav>
@endsection
@section('nav-title')
INKOMENDE FACTUREN
@endsection
@section('main-content')
@foreach($incoming_invoices as $incoming_invoice)
<div class="container invoices-cards border">
    <div class="row text-center pb-4">
        <div class="col-sm-12">
            <h1>{{ $incoming_invoice->contact->naam }} - {{ $incoming_invoice->factuurnummer }}</h1>
        </div>
        <div class="edit-detail-invoice text-right">
                <a href="{{ route('invoices.edit', $incoming_invoice->id) }}" ><i class="fas fa-pen-nib"></i></a><br>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-12">
                <i class="far fa-clock"></i>
                Datum geopend: {{ date_format($incoming_invoice->created_at, "d/m/Y") }} 
                <br>
                <i class="far fa-clock"></i>
                Laatste update: {{ date_format($incoming_invoice->updated_at, "d/m/Y") }}
            </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
                <i class="fas fa-calendar-week"></i> 
                Factuurdatum: {{date("d/m/Y", strtotime($incoming_invoice->datum))}}
        </div>
        <div class="col-sm-12">
                <i class="fas fa-calendar-times"></i>
                Vervaldatum: {{  $incoming_invoice->vervaldatum->format('d/m/Y') }}
        </div>
        <div class="col-sm-12">
                <i class="fas fa-hourglass-end"></i>
                Aantal dagen tot vervaldatum:  {{ $incoming_invoice->vervaldatum->diffForHumans() }}
        </div>
    </div>
    <div class="row">
            <div class="col-sm-5 col-12">Bedrag exclusief btw</div>
            <div class="col-sm-7 col-12 amount">
                    &euro; {{ number_format($incoming_invoice->bedrag_excl,2,",",".") }}
            </div>
    </div>
    <div class="row border-bottom">
                <div class="col-sm-5 col-12">+ BTW {{ $incoming_invoice->btw }}% </div>
                <div class="col-sm-7 col-12 amount">
                    &euro; {{ number_format($incoming_invoice->bedrag_excl * (21/100),2,",",".") }}
            </div>
    </div>
    <div class="row">
                <div class="col-sm-5 col-12">Bedrag inclusief btw</div>
            <div class="col-sm-7 col-12 amount">
                    &euro; {{ number_format($incoming_invoice->bedrag_excl * (1+(21/100)),2,",",".") }}
            </div>
    </div>
    <div class="row">
            <div class="offset-8"></div>
            <div class="col-sm-4 text-center {{ ($incoming_invoice->betaald == 0) ? "red" : "green" }}">Betaalstatus - {{ ($incoming_invoice->betaald == 0) ? 'niet voldaan': 'voldaan' }}</div>
    </div>
</div>
    @endforeach
    @endsection
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
            <a class="nav-link" href="{{route('invoices.incoming')}}">
              <i class="fas fa-arrow-left"></i>
              <br>
              AANKOOPFACTUREN
            </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="{{route('invoices.outgoing')}}">
                <i class="fas fa-arrow-right"></i>
                <br>
                VERKOOPFACTUREN
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
  OVERZICHT FACTUREN
  @endsection
@section('main-content')
<a href="{{ route($invoice_details->inkomend ? 'invoices.outgoing': 'invoices.incoming')  }}">
        Terug naar alle {{ ($invoice_details->inkomend ? 'uitgaande': 'inkomende') }} facturen 
</a>

<article class="beer-teaser">
        <h1>FACT#{{ $invoice_details->id }}</h1>
        <p>Geopend: {{ $invoice_details->created_at }}</p>
        <p>Laatste update: {{ $invoice_details->updated_at }}</p>
        <p>Inkomend/uitgaand: {{ ($invoice_details->inkomend == 1) ? 'Uitgaand': (($invoice_details->inkomend == 1 ? "Inkomend" : "")) }}</p>
        <p>Factuurnummer: {{ $invoice_details->factuurnummer }}</p>
        <p>Klantnaam: {{ $invoice_details->contact->naam }}</p>
        <p>Datum factuur: {{ $invoice_details->datum }}</p>
        <p>Vervaldatum factuur: {{ $invoice_details->vervaldatum }}</p>
        <p>Bedrag exclusief btw:{{ $invoice_details->bedrag_excl }}</p>
        <p>Btw: {{ $invoice_details->btw }}</p>
        <p>Betaald/niet betaald: {{ $invoice_details->betaald }}</p>
</article>
@endsection
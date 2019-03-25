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
            </ul>
      </div>
  </nav>
@endsection
@section('nav-title')
@if($search_results == null)
    HELAAS, WE VONDEN GEEN RESULTATEN
    <form action="{{ route('invoices.search') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="search_invoice" placeholder="Probeer het opnieuw..." 
        class="form-control form-control-smaller">
        <input type="submit" class="form-control form-submit-smaller">
      </form>
@else
RESULTAAT VOOR JOUW ZOEKOPRDACHT "{{$search_results->factuurnummer}}"
<form action="{{ route('invoices.search') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="search_invoice" placeholder="Zoek op factuurnummer..." 
    class="form-control form-control-smaller">
    <input type="submit" class="form-control form-submit-smaller">
  </form>
@endif
@endsection 
@section('main-content')
@if($search_results == null)
    
@else
<div class="container invoices-cards border">
    <div class="row">
        <div class="col-sm-10">
            <h1>{{ $search_results->contact->naam }} - {{ $search_results->factuurnummer }}</h1>
        </div>
        <div class="col-sm-2 text-right">
                <a href="{{ route('invoices.edit', $search_results->id) }}" ><i class="fas fa-pen-nib"></i></a><br>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-12">
                <i class="far fa-clock"></i>
                Datum geopend: {{ date_format($search_results->created_at, "d/m/Y") }} - Laatste update: {{ date_format($search_results->updated_at, "d/m/Y") }}
            </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
                <i class="fas fa-calendar-week"></i> 
                Factuurdatum: {{date("d/m/Y", strtotime($search_results->datum))}}
        </div>
        <div class="col-sm-12">
                <i class="fas fa-calendar-times"></i>
                Vervaldatum: {{  $search_results->vervaldatum->format('d/m/Y') }}
        </div>
        <div class="col-sm-12">
                <i class="fas fa-hourglass-end"></i>
                Aantal dagen tot vervaldatum:  {{ $search_results->vervaldatum->diffForHumans() }}
        </div>
    </div>
    <div class="row">
            <div class="col-sm-5">Bedrag exclusief btw</div>
            <div class="col-sm-2 text-right">
                    &euro; {{ number_format($search_results->bedrag_excl,2,",",".") }}
            </div>
    </div>
    <div class="row border-bottom">
            <div class="col-sm-5">+ BTW {{ $search_results->btw }}% </div>
            <div class="col-sm-2 text-right">
                    &euro; {{ number_format($search_results->bedrag_excl * (21/100),2,",",".") }}
            </div>
    </div>
    <div class="row">
            <div class="col-sm-5">Bedrag inclusief btw</div>
            <div class="col-sm-2 text-right">
                    &euro; {{ number_format($search_results->bedrag_excl * (1+(21/100)),2,",",".") }}
            </div>
    </div>
    <div class="row">
            <div class="offset-8"></div>
            <div class="col-sm-4 text-center {{ ($search_results->betaald == 0) ? "red" : "green" }}">Betaalstatus - {{ ($search_results->betaald == 0) ? 'niet voldaan': 'voldaan' }}</div>
    </div>
@endif
</div>
@endsection
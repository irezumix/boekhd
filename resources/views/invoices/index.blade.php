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
<br>  
<div class="container">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-sm-3">
                <form action="{{ route('invoices.search') }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="search_invoice" placeholder="Zoek op factuurnummer..." 
                        class="form-control form-control-special search_invoice">
                        <button type="submit" class="form-control form-submit-special searchBtn">
                                <i class="fas fa-file-invoice-dollar"></i>
                        </button>
                      </form>
        </div>
        <div class="col-sm-3">
                <form action="/filterinvoicesbyyear" method="POST">
                    {{ csrf_field() }}
                    <select name="searchbyyear" id="searchbyyear" class="form-control search-function form-control-special">
                        <option disabled selected value>-- Filter per jaar -- </option>
                      @for($i=2018; $i<(date("Y")+2); $i++)
                        <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                    <button type="submit" id='searchbutton' class="form-control form-submit-special">
                            <i class="fas fa-clock text-light"></i>
                    </button>
                  </form>
        </div>
    </div>
</div>
@endsection
@section('main-content')
<div class="container-fluid invoice-overview">
        <div class="row text-light border-top">
                <div class="col-2">GEOPEND</div>
                <div class="col-2">FACTUUR</div>
                <div class="col-2">CONTACTNAAM</div>
                <div class="col-2">FACTUURDATUM</div>
                <div class="col-2">TOTAALBEDRAG</div>
                <div class="col-1">BETAALD</div>
                <div class="col-1"></div>
            </div>
@foreach($invoices as $invoice)

        <div class="row border-bottom {!! $invoice->inkomend ? 'out_bg':'inc_bg' !!}">
            <div class="col-2">{{ date_format($invoice->created_at, "d/m/Y") }}</div>
            <div class="col-2">{{ $invoice->factuurnummer }}</div>
            <div class="col-2">{{ $invoice->contact->naam }}</div>
            <div class="col-2">{{ $invoice->vervaldatum->format('d/m/Y') }}</div>
            <div class="col-2">&euro; {{ number_format($invoice->bedrag_excl * (1+(21/100)),2,",",".") }}</div>
            <div class="col-1 text-center">
              <a href="{{ route('invoices.pay', $invoice->id) }}">{!! $invoice->betaald ? '<i class="far fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>'   !!}</a>               
                
            </div>
            <div class="col-1">
                <a href="{{ route('invoices.edit', $invoice->id) }}" >
                    <i class="fas fa-pen-nib"></i>
                </a> 
              </div>
        </div>
@endforeach
</div>
@endsection
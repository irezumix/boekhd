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
OVERZICHT FACTUREN {{$_POST['searchbyyear']}}
<br>  
<div class="container">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-sm-3">
                <form action="{{ route('invoices.search') }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="search_invoice" placeholder="Zoek op factuurnummer..." 
                        class="form-control form-control-special">
                        <button type="submit" class="form-control form-submit-special">
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
                    <button type="submit" id="searchbutton" class="form-control form-submit-special">
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
                <div class="col-sm-2">GEOPEND</div>
                <div class="col-sm-2">FACTUUR</div>
                <div class="col-sm-2">CONTACTNAAM</div>
                <div class="col-sm-2">FACTUURDATUM</div>
                <div class="col-sm-2">TOTAALBEDRAG</div>
                <div class="col-sm-1">BETAALD</div>
                <div class="col-sm-1"></div>
            </div>
@for($i=0;$i<sizeof($search_results);$i++)
        <div class="row border-bottom {!! $search_results[$i]->inkomend ? 'inc_bg':'out_bg' !!}">
            <div class="col-sm-2">{{ date_format($search_results[$i]->created_at, "d/m/Y") }}</div>
            <div class="col-sm-2">{{ $search_results[$i]->factuurnummer }}</div>
            <div class="col-sm-2">{{ $search_results[$i]->contact->naam }}</div>
            <div class="col-sm-2">{{ $search_results[$i]->vervaldatum->format('d/m/Y') }}</div>
            <div class="col-sm-2">&euro; {{ number_format($search_results[$i]->bedrag_excl * (1+(21/100)),2,",",".") }}</div>
            <div class="col-sm-1 text-center">
              <a href="{{ route('invoices.pay', $search_results[$i]->id) }}">{!! $search_results[$i]->betaald ? '<i class="far fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>'   !!}</a>               
                
            </div>
            <div class="col-sm-1">
                <a href="{{ route('invoices.edit', $search_results[$i]->id) }}" >
                    <i class="fas fa-pen-nib"></i>
                </a> 
              </div>
        </div>    
@endfor
</div>     
@endsection
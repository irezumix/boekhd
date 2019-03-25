@extends('layouts.frontend')
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
VOEG NIEUWE FACTUUR TOE
@endsection
@section('main-content')
<form action="{{ route('invoices.store') }}" method="post" class="create-edit-form">
        {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <label for="inkomend">Soort</label>
                </div>
                <div class="col-sm-10">
                        <select id="inkomend" name="inkomend" class="form-control">
                            <option disabled selected>-- KIES SOORT FACTUUR --</option>
                            <option value="0" >aankoopfactuur</option>
                            <option value="1">verkoopfactuur</option>
                        </select>
                        @if($errors->has('inkomend'))
                            <span class="error">
                                {{ $errors->first('inkomend') }}
                            </span>
                         @endif
                </div>
                <div class="col-sm-2">
                        <label for="factuurnummer">Factuurnummer</label>
                    </div>
                    <div class="col-sm-10">
    
                                    <input type="text" id="factuurnummer" name="factuurnummer" class="form-control">
                            @if($errors->has('factuurnummer'))
                                    <span class="error">
                                        {{ $errors->first('factuurnummer') }}
                                    </span>
                                    @endif
                                    </span>
        
                    </div>
                    <div class="col-sm-2">Contact</div>
                        <div class="col-sm-10">
        
                                        <select id="klant_id" name="klant_id" class="form-control">
                                            <option disabled selected>-- KIES CONTACT --</option>
                                            @foreach (App\Contact::all()->sortBy('naam') as $contact)
                                            <option value="{{$contact->id}}">{{$contact->naam}}</option>
                                            @endforeach
                                        </select>
            
                        </div>
                        <div class="col-md-2 col-sm-2">
                                <label for="datum">Datum</label>
                        </div>
                        <div class="col-md-4 col-sm-10">
                                <input type="date" id="datum" name="datum" placeholder="YYYY-MM-DD" class="form-control">
                                @if($errors->has('datum'))
                                        <span class="error">
                                            {{ $errors->first('datum') }}
                                        </span>
                                        @endif
                                        </span>
                        </div>
                        <div class="col-md-2 col-sm-2 test">
                                <label for="vervaldatum">Vervaldatum</label>
                        </div>
                        <div class="col-md-4 col-sm-10">
        
        

                                        <input type="date" id="vervaldatum" name="vervaldatum" placeholder="YYYY-MM-DD" class="form-control">
                                @if($errors->has('vervaldatum'))
                                        <span class="error">
                                            {{ $errors->first('vervaldatum') }}
                                        </span>
                                        @endif
                                        </span>
                
                        </div>
                        <div class="col-sm-2">
                                <label for="bedrag_excl">Bedrag excl. btw</label>
                        </div>
                        <div class="col-sm-10">
        
            
                                        <input type="text" id="bedrag_excl" name="bedrag_excl" class="form-control">
                                @if($errors->has('bedrag_excl'))
                                        <span class="error">
                                            {{ $errors->first('bedrag_excl') }}
                                        </span>
                                        @endif
                                        </span>
                
                        </div>

                        <div class="col-sm-2">
                                <label for="btw">BTW-precentage</label>
                        </div>
                        <div class="col-sm-10">
        
            
                                        <select id="betaald" name="btw" class="form-control">
                                                <option disabled selected>-- KIES BTW-PERCENTAGE --</option>
                                                <option value="21">21%</option>
                                                <option value="6">6%</option>
                                                <option value="0">0%</option>
                                        </select>  
                                @if($errors->has('btw'))
                                        <span class="error">
                                            {{ $errors->first('btw') }}
                                        </span>
                                @endif
                
                        </div>
                        <div class="col-sm-2">Betaald</div>
                        <div class="col-sm-10">
        
                                        <select id="betaald" name="betaald" class="form-control">
                                                <option disabled selected>-- KIES BETAALSTATUS --</option>
                                                <option value="0">niet betaald</option>
                                                <option value="1">betaald</option>
                                        </select>               
                                        
                                        @if($errors->has('betaald'))
                                        <span class="error">
                                            {{ $errors->first('betaald') }}
                                        </span>
                                        @endif
                                        
            
                        </div>
                        
            </div>
        </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <button type="submit" class="form-control form-control-lg mt-3">VOEG FACTUUR TOE</button>
                </div>
            </div>
        

    </form>
    @endsection
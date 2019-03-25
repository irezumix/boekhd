@extends('layouts.frontend')
@section('nav-title')
@if($user = Auth::user())
    Hey, {{Auth::user()->name}}
@endif
 @endsection
@section('main-content')
    <div class="container-fluid admin-container">
        <div class="row">
            <div class="col-12 text-center">
                Wat wil je doen?
            </div>
        </div>
        <div class="row">
                <div class="offset-xl-2 offset-md-0"></div>
                <div class="col-xl-2 col-md-6 text-center">
                    <p>
                        <a href="/invoices">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <br>
                            Facturen
                        </a>
                    </p>
                </div>
                <div class="col-xl-2 col-md-6 text-center">
                    <p>
                        <a href="/contacts">
                            <i class="fas fa-users"></i>
                            <br>
                            Contacten
                        </a>
                    </p>
                </div>
                <div class="col-xl-2 col-md-6 text-center">
                    <p>
                        <a href="/results">
                            <i class="fas fa-poll"></i>
                            <br>
                            Resultaat
                        </a>
                    </p>
                </div>
                <div class="col-xl-2 col-md-6 text-center">
                    <p>
                        <a href="/results/vat">
                            <i class="fas fa-list-ul"></i>
                            <br>
                            BTW-listing
                        </a>
                    </p>
                </div>
            </div>
    </div>
    <div class="filler"></div>
@endsection
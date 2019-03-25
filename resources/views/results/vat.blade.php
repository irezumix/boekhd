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
        </ul>
      </div>
  </nav>
@endsection
@section('nav-title')
BTW-LISTING
@endsection
@section('main-content')
    <div class="select">
            <form method="GET" class="text-center">
                <p>
                    Ik wil de resultaten opvragen van het jaar:
                    <select name="jaar" id="jaar">
                        <option value="2019" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2019) {
                                echo 'selected';
                            }
                        } ?>>2019</option>
                        <option value="2020" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2020) {
                                echo 'selected';
                            }
                        } ?>>2020</option>
                        <option value="2021" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2021) {
                                echo 'selected';
                            }
                        } ?>>2021</option>
                        <option value="2022" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2022) {
                                echo 'selected';
                            }
                        } ?>>2022</option>
                        <option value="2023" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2023) {
                                echo 'selected';
                            }
                        } ?>>2023</option>
                        <option value="2024" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2024) {
                                echo 'selected';
                            }
                        } ?>>2024</option>
                        <option value="2025" <?php 
                        if(isset($_GET['jaar'])){
                            if(($_GET['jaar']) == 2025) {
                                echo 'selected';
                            }
                        } ?>>2025</option>
                    </select>
                    <input type="submit" value="Bevestigen">
                </p>
            </form>
    </div>

    @if($btwList)
    <div id="result">
        <ul>
            @foreach($btwList as $key=>$value)
            <li>{{ $key }}: €{{ $value }}</li>
            @endforeach
        </ul>
        
    </div>
    @endif

@endsection
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>BookedIn</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>
<body>
    <div class="container-full-width">
        <header class="nav-header text-right">
            {{-- @include('includes.logo') --}}
            @include('includes.main-nav')
            @yield("nav")
        </header>
        <header class="nav-title text-center text-light">
            <h1>
                @yield('nav-title')
            </h1>
        </header>
    </div>
    <div class="container-full-width">
        
        <section class="main-content">
            @yield('main-content')
        </section>
        <aside class="sidebar">
            @yield('sidebar')
        </aside>
        <footer class="main-footer text-center">
            <small>&copy; {{ date('Y') }} - Webdesign by PDJEC</small>
        </footer>
    </div>

    <script
			  src="http://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
              crossorigin="anonymous"></script>
              

              
<script>
$('#searchbutton').attr('disabled','disabled');
$('#searchbyyear').on("change",function(){
    if($(this).val() == ''){
        $('#searchbutton').attr('disabled','disabled'); //Disables if Values of Select Empty
    }else{
        $('#searchbutton').removeAttr('disabled');  
    }
});

$(document).ready(function(){
    

    $('.searchBtn').attr('disabled','disabled')
    $('.search_invoice').keyup(function() {

        var empty = true;
        $('.search_invoice').each(function() {
            if ($(this).val().length > 0) {
                empty = false;
            }
        });

        if (empty) {
            $('.searchBtn').attr('disabled', 'disabled');
        } else {
            $('.searchBtn').removeAttr('disabled');
        }
    });




});

</script>
</body>
</html>
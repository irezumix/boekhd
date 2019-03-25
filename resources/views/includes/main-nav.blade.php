<nav>
@if (Auth::check())
    <a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
    <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
@else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
@endif
</nav>
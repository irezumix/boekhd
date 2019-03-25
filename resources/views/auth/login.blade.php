@extends('layouts.frontend')

@section('main-content')
    <h1>Login</h1>

    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        {{ csrf_field() }}
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
@endsection
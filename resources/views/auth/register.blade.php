@extends('layouts.frontend')

@section('main-content')
    <h1>Register</h1>

    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        {{ csrf_field() }}
        <p>
            <label for="name">Name:</label>
            <input type="name" name="name" id="name">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
@endsection
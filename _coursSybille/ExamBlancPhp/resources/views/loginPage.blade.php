@extends('layout')

@section('content')
<form action="{{route('login.custom')}}" method="post">
    @method('POST')
    @csrf
    <label for="login">Login</label>
    <input type="text" id="login" name="login" placeholder="login" required>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="mot de passe" required>
    <input type="submit" value="se connecter">
</form>
@endsection

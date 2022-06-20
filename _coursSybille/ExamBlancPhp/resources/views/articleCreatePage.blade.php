@extends('layout')

@section('content')
    <form action="{{route('articles.store')}}" method="post">
    @csrf
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre">
        <label for="photo">Photo</label>
        <input type="text" name="photo" id="photo">
        <label for="texte">Texte</label>
        <textarea name="texte" id="texte" cols="30" rows="10"></textarea>
        <input type="submit">
    </form>
@endsection

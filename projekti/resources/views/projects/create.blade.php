@extends('layouts.app')

@section('content')
<div class="input-form">
    <h1>Novi Projekt</h1>
    <form action="{{ route('projects.index') }}" method="POST">
        @csrf
        <label for="name">Naziv:</label>
        <input type="text" id="name" name="name">
        <label for="description">Opis:</label>
        <input type="text" id="description" name="description">
        <label for="cost">Cijena:</label>
        <input type="number" id="cost" name="cost">
        <input type="submit" value="Stvori projekt">
    </form>
</div>
@endsection
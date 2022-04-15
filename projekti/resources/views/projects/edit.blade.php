@extends('layouts.app')

@section('content')

<div class="input-form">
    <form action="{{ route('projects.show', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Obriši projekt</button>
    </form>
</div>

<div class="input-form">
    <a href="{{ route('projects.add_user', $project->id) }}">Dodaj korisnika na projekt</a>
</div>

<div class="input-form">
    <h1>Uredi Projekt</h1>
    <form action="{{ route('projects.show', $project->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Naziv:</label>
        <input type="text" id="name" name="name" value="{{ old('project') ? old('project') : $project->name }}">
        <label for="leader">Voditelj:</label>
        <input type="text" id="leader" name="leader" value="{{ old('project') ? old('project') : $project->leader }}">
        <label for="description">Opis:</label>
        <input type="text" id="description" name="description" value="{{ old('project') ? old('project') : $project->description }}">
        <label for="cost">Cijena:</label>
        <input type="number" id="cost" name="cost" value="{{ old('project') ? old('project') : $project->cost }}">
        <label for="finished_jobs">Obavljeni poslovi:</label>
        <input type="text" id="finished_jobs" name="finished_jobs" value="{{ old('project') ? old('project') : $project->finished_jobs }}">
        <label for="start_date">Vrijeme početka:</label>
        <input type="text" id="start_date" name="start_date" value="{{ old('project') ? old('project') : $project->start_date }}">
        <label for="description">Vrijeme završetka:</label>
        <input type="text" id="end_date" name="end_date" value="{{ old('project') ? old('project') : $project->end_date }}">
        <input type="submit" value="Spremi izmjene">
    </form>
</div>
@endsection
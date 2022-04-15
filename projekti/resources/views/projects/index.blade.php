@extends('layouts.app')

@section('content')
<div class="home-content">
    <a href="{{ route('projects.create') }}">Novi projekt</a>
</div>
<div class="project-content">
    <h1>Projekti</h1>
    @foreach(Auth::user()->projects as $project)
    <div class="project-item">
        <p>Naziv: {{ $project->name }}</p>
        <p>Opis: {{ $project->description }}</p>
        <a href="{{ route('projects.edit', $project->id) }}">Uredi projekt </a>
    </div>
    @endforeach
</div>
@endsection
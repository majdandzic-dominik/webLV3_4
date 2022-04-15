@extends('layouts.app')

@section('content')
<div class="project-content">
    <h1>Dodaj korisnika</h1>
    @foreach($users as $user)
    <div class="project-item">
        <p>Ime: {{ $user->name }}</p>
        <form action="{{ route('projects.add_user', $user->id, $project->id) }}" method="POST">
            @csrf
            <input type="submit" value="Dodaj korisnika">
        </form>
    </div>
    @endforeach
</div>
@endsection
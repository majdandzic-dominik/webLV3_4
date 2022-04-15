@extends('layouts.app')

@section('content')
<div style="width: 50%;">
    <div style="border: solid 1px black; padding: 10px 30px;">
        Naziv: {{ $project->name }}
    </div>
    <div style="border: solid 1px black; padding: 10px 30px;">
        Voditelj: {{ $project->leader }}
    </div>
    <div style="border: solid 1px black; padding: 10px 30px;">
        Opis: {{ $project->description }}
    </div>
    <div style="border: solid 1px black; padding: 10px 30px;">
        Cijena: {{ $project->cost }}
    </div>
    <div style="border: solid 1px black; padding: 10px 30px;">
        Završeni poslovi: {{ $project->finished_jobs }}
    </div>
    <div style="border: solid 1px black; padding: 10px 30px;">
        Datum početka: {{ $project->start_date }}
    </div>
    <div style="border: solid 1px black; padding: 10px 30px;">
        Datum završetka: {{ $project->end_date }}
    </div>
    <form action="{{ route('projects.show', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Obriši projekt</button>
    </form>
</div>
@endsection
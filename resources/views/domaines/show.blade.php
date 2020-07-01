@extends('layouts.app')

@section('content')
    <h1>sous domaine de {{ $domaine->libelle }}</h1>
    <div>
        <ul>
            @foreach($sousdomaine as $sd) 
            <li><a href="/sousdomaine/{{ $sd->id }}">{{ $sd->libelle }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
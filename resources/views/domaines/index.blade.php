@extends('layouts.app')

@section('content')
    <h1>listes des domaines</h1>
    <li><a href="/domaine/create">Nouveau Domaine</a></li>
    <table>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">libelle</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($domaine as $dm) 
            <tr>
            <th scope="row">{{ $dm->id }}</th>
            <td>{{ $dm->libelle }}</td>
            <td><a href="/domaine/{{ $dm->id }}/edit">editer</a>
            <form action="/domaine/{{ $dm->id }}" method="POST" style=" display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> supprrimer</button>
            </form>
            </td>
            </tr>
            @endforeach
        <tbody>
    </table>
@endsection
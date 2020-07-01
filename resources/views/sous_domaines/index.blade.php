@extends('layouts.app')

@section('content')

    <h1>listes des sous domaines</h1>
    <li><a href="/sousdomaine/create">Nouveau Sous Domaines</a></li>
    <table>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">domaine</th>
            <th scope="col">libelle</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sousdomaine as $sd) 
                <tr>
                <th scope="row">{{ $sd->id }}</th>
                <td>{{ $sd->domaine->libelle }}</td>
                <td>{{ $sd->libelle }}</td>
                <td><a href="/sousdomaine/{{ $sd->id }}/edit">editer</a>
                <form action="/sousdomaine/{{ $sd->id }}" method="POST" style=" display: inline">
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
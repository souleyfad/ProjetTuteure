@extends('layouts.app')

@section('content')
<div>
        <ul>
            @foreach($domaine ?? '' as $dm) 
            <li><a href="/domaine/{{ $dm->id }}">{{ $dm->libelle }}</a></li>
            @endforeach
        </ul>
</div>
<h1>listes de document</h1>
<div class="col-md-6">
    <form action="/search" method="get">
        <div class="input-group">
            <input type="search" name="search" class="form-controll">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </span>
        </div>
    </form>
</div>
    <li><a href="/document/create">Nouveau Document</a></li>
    <table>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Theme</th>
            <th scope="col">Domaine</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($document as $dc) 
                <tr>
                <th scope="row">{{ $dc->id }}</th>
                <td><a href="/document/{{ $dc->id }}">{{ $dc->titre}}</a></td>
                <td>{{ $dc->theme}}</td>
                <td>{{ $dc->sousdomaine->libelle }}</td>
                <td><a href="/document/download/{{ $dc->doc }}">telecharger</a>
                <a href="/document/{{ $dc->id }}/edit">editer</a>
                <form action="/document/{{ $dc->id }}" method="POST" style=" display: inline">
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
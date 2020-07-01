@extends('layouts.app')

@section('content')
    <form action="/domaine/{{ $domaine->id }}" method="post">
    @method('PATCH')
    @csrf
    <div class="form-group">
    <input type="text" class="form-control @error('libelle') is-invalid @enderror" 
    name="libelle" placeholder="entrez le domaine..." value="{{ old('libelle') ?? $domaine->libelle }}">
    @error('libelle')
    <div class="invalid-feedback">
        veuillez remplir ce champs svp
    </div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-4">valider</button>
    </form>
@endsection
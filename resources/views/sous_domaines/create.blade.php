@extends('layouts.app')

@section('content')
    <form action="/sousdomaine" method="post">
    @csrf
    <div class="form-group">
        <select name="domaine_id" class="custom-select @error('domaine_id') is-invalid @enderror"
        placeholder="choississez le domaine...">
        @foreach($domaine as $domaines)    
            <option value="{{ $domaines->id }}">{{ $domaines->libelle }}</option>
        @endforeach
        </select>
        @error('domaine_id')
        <div class="invalid-feedback">
            veuillez remplir ce champs svp
        </div>
        </div>
        @enderror
    </div>
    <div class="form-group">
    <input type="text" class="form-control @error('libelle') is-invalid @enderror" 
    name="libelle" placeholder="entrez le libelle...">
    @error('libelle')
    <div class="invalid-feedback">
        veuillez remplir ce champs svp
    </div>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-4">valider</button>
    </form>
@endsection
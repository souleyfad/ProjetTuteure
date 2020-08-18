@extends('layouts.app')

@section('content')
<h1>Titre: {{ $document->titre }}</h1>
<h3>Thème: {{ $document->theme }}</h3>
<hr>
<h5>les commentaires</h5>
@forelse($document->commentaire as $commentaire)
    <div class="card">
        <div class="card-body">
            {{ $commentaire->contenu }}
            {{ $commentaire->user->name }}
        </div>
    </div>
@empty
    <div class="alert"> pas de commentaire, rajouter</div>
@endforelse
<h5>Ajouter votre commentaire ici</h5>
<form action="{{ route('commentaire.store', $document) }}" method="POST" class="mt-3">
    @csrf
    <div class="form-group">
        <label for="contenu">Votre commentaire</label>
        <textarea name="contenu" id="contenu" cols="10" rows="10"
         class="form-control @error('contenu') is-invalid @enderror"></textarea>
         @error('contenu')
        <div class="invalid-feedback">{{ $errors->first('contenu')}}</div>
    @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Envoyer votre commentaire</button>
</form>
<iframe src="{{url('storage/fichier/'.$document->doc)}}" frameborder="0"></iframe>

@endsection
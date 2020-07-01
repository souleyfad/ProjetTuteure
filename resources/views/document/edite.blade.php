@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Editer le document</h2>
            <form action="/document/{{ $document->id }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group">
                <input type="text" class="form-control @error('titre') is-invalid @enderror" 
                name="titre" placeholder="entrez le titre du document..." value="{{ old('titre') ?? $document->titre }}">
                @error('titre')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                @enderror
                </div>

                <div class="form-group">
                    <select name="domaine_id" class="custom-select @error('domaine_id') is-invalid @enderror"
                    placeholder="choississez le domaine..." 
                    value="{{ old('domaine_id') ?? $document->domaine->libelle }}">
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
                    <select name="sousdomaine_id" class="custom-select @error('sousdomaine_id') is-invalid @enderror"
                    placeholder="choississez le sous domaine..." 
                    value="{{ old('sousdomaine_id') ?? $document->sousdomaine->libelle }}">
                    @foreach($sousdomaine as $sousdomaines)    
                        <option value="{{ $sousdomaines->id }}">{{ $sousdomaines->libelle }}</option>
                    @endforeach
                    </select>
                    @error('sousdomaine_id')
                    <div class="invalid-feedback">
                        veuillez remplir ce champs svp
                    </div>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                <input type="text" class="form-control @error('auteur') is-invalid @enderror" 
                name="auteur" placeholder="Entrez l'auteur..." value="{{ old('auteur') ?? $document->auteur }}">
                @error('auteur')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>
                <div class="form-group">
                <input type="date" class="form-control @error('date_publication') is-invalid @enderror" 
                name="date_publication" placeholder="dd/mm/aaaa" 
                value="{{ old('date_publication') ?? $document->date_publication }}">
                @error('date_publication')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>

                <div class="form-group">
                <input type="text" class="form-control @error('theme') is-invalid @enderror" 
                name="theme" placeholder="Entrez le theme.." value="{{ old('theme') ?? $document->theme }}">
                @error('theme')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>

                <div class="form-group">
                <input type="file" class="form-control @error('doc') is-invalid @enderror" 
                name="doc" placeholder="choisir un document..." value="{{ old('doc') ?? $document->doc }}">
                @error('doc')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>

                </div>
                <button type="submit" class="btn btn-primary mt-4">Sauvegarder les modifications</button>
            </form>
            </div>
        </div>
    </div>   
@endsection
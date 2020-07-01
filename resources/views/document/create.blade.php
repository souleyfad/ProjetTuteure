@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>publier un nouveau document</h2>
            <form action="/document" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                <input type="text" class="form-control @error('titre') is-invalid @enderror" 
                name="titre" placeholder="entrez le titre du document..." required>
                @error('titre')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                @enderror
                </div>

                <div class="form-group">
                    <select name="domaine_id" class="custom-select @error('domaine_id') is-invalid @enderror"
                    placeholder="choississez le domaine..." required>
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
                    placeholder="choississez le sous domaine..." required>
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
                name="auteur" placeholder="Entrez l'auteur..." required>
                @error('auteur')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>
                <div class="form-group">
                <input type="date" class="form-control @error('date_publication') is-invalid @enderror" 
                name="date_publication" placeholder="dd/mm/aaaa" required>
                @error('date_publication')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>

                <div class="form-group">
                <input type="text" class="form-control @error('theme') is-invalid @enderror" 
                name="theme" placeholder="Entrez le theme.." required>
                @error('theme')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>

                <div class="form-group">
                <input type="file" class="form-control @error('doc') is-invalid @enderror" 
                name="doc" placeholder="choisir un document..." required>
                @error('doc')
                <div class="invalid-feedback">
                    veuillez remplir ce champs svp
                </div>
                </div>
                @enderror
                </div>

                </div>
                <button type="submit" class="btn btn-primary mt-4">Ajouter le document</button>
            </form>
        </div>
        </div>
    </div>
@endsection
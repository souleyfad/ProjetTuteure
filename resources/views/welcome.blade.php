@extends('layouts.app')

@section('content')
<div class="row">
    <article class="col-sm-8">
        <h1>Bienvenue sur la page d'accueil de notre site web</h1>
    </article>
    <aside class="col-sm-4"  style="margin: 50 px">
    <h1>contactez nous</h1>
    <form action="/contact" method="POST">
        @csrf
        <div class="form-group">
        <input type="text" class="form-control @error('name') is-invalid @enderror" 
        name="name" placeholder="Votre pseudo..." value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">
                veuillez remplir ce champs svp
            </div>
        @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
            name="email" placeholder="Votre email..." value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                veuillez remplir ce champs svp
            </div>
            @enderror
        </div>
        <div class="form-group">
        <textarea name="message" cols="30" rows="10" 
        class="form-control @error('message') is-invalid @enderror" placeholder="Votre message...">
        {{ old('message')}}
        </textarea>
        @error('message')
            <div class="invalid-feedback">
                veuillez remplir ce champs svp
            </div>
        @enderror
        </div>
    <button type="submit" class="btn btn-primary">Envoyer le message</button>
    </form>
    </div> 
    </aside>
</div>

@endsection
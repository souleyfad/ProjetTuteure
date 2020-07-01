@extends('layouts.app')

@section('content')
<h1>Titre: {{ $document->titre }}</h1>
<h3>Thème: {{ $document->theme }}</h3>
<iframe src="{{url('storage/fichier/'.$document->doc)}}" frameborder="0"></iframe>

@endsection
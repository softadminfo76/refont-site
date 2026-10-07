@extends('layouts.back')

@section('titre', 'Ajouter une réalisation')

@section('fil')
  <li class="breadcrumb-item"><a href="{{ route('realisations.index') }}">Réalisations</a></li>
@endsection

@section('contenu')
  <form action="{{ route('realisations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.realisations._form')
  </form>
@endsection
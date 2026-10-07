@extends('layouts.back')

@section('titre', 'Modifier une réalisation')

@section('fil')
  <li class="breadcrumb-item"><a href="{{ route('realisations.index') }}">Réalisations</a></li>
@endsection

@section('contenu')
  <form action="{{ route('realisations.update', $realisation) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.realisations._form')
  </form>
@endsection
@extends('layouts.back')

@section('titre', 'Modifier le projet')

@section('contenu')
  <form action="{{ route('admin.projets.update', $projet) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.projets._form')
  </form>
@endsection
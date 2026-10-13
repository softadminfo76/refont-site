@extends('layouts.back')

@section('titre', 'Modifier le département')

@section('contenu')
  <form action="{{ route('departements.update', $departement) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.departements._form')
  </form>
@endsection

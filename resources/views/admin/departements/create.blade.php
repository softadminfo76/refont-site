@extends('layouts.back')

@section('titre', 'Nouveau département')

@section('contenu')
  <form action="{{ route('departements.store') }}" method="POST">
    @csrf
    @include('admin.departements._form')
  </form>
@endsection
@extends('layouts.back')

@section('titre', 'Nouveau projet')

@section('contenu')
  <form action="{{ route('admin.projets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.projets._form')
  </form>
@endsection
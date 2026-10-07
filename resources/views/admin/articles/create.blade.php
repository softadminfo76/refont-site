@extends('layouts.back')

@section('titre', 'Ajouter un article')

@section('fil')
  <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Blog</a></li>
@endsection

@section('contenu')
  <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.articles._form')
  </form>
@endsection
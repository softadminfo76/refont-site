@extends('layouts.back')

@section('titre', 'Modifier un article')

@section('fil')
  <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Blog</a></li>
@endsection

@section('contenu')
  <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.articles._form')
  </form>
@endsection
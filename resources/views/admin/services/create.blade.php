@extends('layouts.back')

@section('titre', 'Ajouter un service')

@section('fil')
  <li class="breadcrumb-item">
    <a href="{{ route('services.index') }}">Services</a>
  </li>
@endsection

@section('contenu')
  <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('admin.services._form')
  </form>
@endsection
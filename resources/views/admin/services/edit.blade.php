@extends('layouts.back')

@section('titre', 'Modifier un service')

@section('fil')
  <li class="breadcrumb-item">
    <a href="{{ route('services.index') }}">Services</a>
  </li>
@endsection

@section('contenu')
  <form
    action="{{ route('services.update', $service) }}"
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    @method('PUT')

    @include('admin.services._form')
  </form>
@endsection
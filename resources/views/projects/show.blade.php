@extends('layout')

@section('title', 'Portfolio | ' . $project->title)

@section('content')
<div class="container">
  <div class="bg-white p-4 shadow rounded">
    <h1 class="display-4 text-left pb-2">{{ $project->title }}</h1>
    <p class="lead text-secondary">{{ $project->description }}</p>
      <p class="text-black-50 m-1">Creado {{ $project->created_at->diffForHumans() }}</p>
      <p class="text-black-50 m-1">Editado {{ $project->updated_at->diffForHumans() }}</p>
      <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('projects.index') }}">Volver</a>
      @auth
        <div class="btn-group btn-group-m">
          <a class="btn btn-primary rounded text-white m-3" href="{{ route('projects.edit', $project) }}">EDITAR</a>
          <a class="btn btn-danger rounded m-3" href="#" onclick="document.getElementById('delete-project').submit()">ELIMINAR</a>
        </div>
        <form class="d-none" id="delete-project" action="{{ route('projects.destroy', $project) }}" method="POST">
          @csrf @method('DELETE')
        </form>
      @endauth
      </div>
  </div>
</div>
@endsection
@extends('layout')

@section('title', 'Portafolio')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="display-4 fw-bold mb-0">PORTAFOLIO</h1>
  @auth
  <a class="btn btn-primary text-white" href="{{ route('projects.create') }}">
    Crea un nuevo proyecto
  </a>
  @endauth
</div>
<p class="clead text-secondary">
  Una vez registrado o iniciado sesion aqui podras ir añadiendo tus proyectos. Se iran acumulando en esta lista y desde aqui podras acceder a todos ellos para editarlos o eliminarlos.
</p>
  <ul class="list-group">
    <form method="GET" class="row row-cols-lg-auto g-2 mb-3">
      @csrf
      <div class="col">
        <input type="text" class="form-control" name="term" value="" placeholder="Buscar...">
      </div>
      <div class="col">
       <button class="btn btn-primary text-white me-4">Buscar</button>
       <a href="{{ route('projects.index') }}" class="btn btn-primary text-white">Volver a la lista</a>
      </div>
    </form>
    @forelse ($projects as $project)
    <li class="list-group-item border-0 mb-3 shadow-sm">
      <a class="d-flex justify-content-between align-items-center text-decoration-none text-secondary" href="{{ route('projects.show', $project) }}">
        <span class="fw-bold">
          {{ $project->title }}
        </span>
        <span class="text-black-50">
          {{ $project->created_at->format('d/m/Y') }}
        </span>
      </a>
    </li>
    @empty
    <li class="list-group-item border-0 mb-3 shadow-sm">
      <span class="fw-bold">No hay proyectos para mostrar.</span>
    </li>
    @endforelse
    {{ $projects->onEachSide(1)->links() }}
  </ul>
</div>
@endsection
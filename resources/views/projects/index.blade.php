@extends('layout')

@section('title', 'Proyectos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        @isset($category)
        <div class="d-flex flex-column">
            <h1 class="display-4 fw-bold mb-2">{{$category->name}}</h1>
            <a href="{{ route('projects.index') }}" class="">Volver a la lista</a>
        </div>
        @else
        <h1 class="display-4 fw-bold mb-0">PROYECTOS</h1>
        @endisset
        @can('create', $newProject)
        <a class="btn btn-primary text-white" href="{{ route('projects.create') }}">
            Crea un nuevo proyecto
        </a>
        @endcan
    </div>
    <p class="clead text-secondary">
        Una vez registrado e iniciado sesion, aqui podras ir añadiendo tus proyectos. Se iran acumulando en esta lista y desde aqui podras acceder a todos ellos para editarlos o eliminarlos.
    </p>
    {{-- <form method="GET" class="row row-cols-lg-auto g-2 mb-3">
        @csrf
        <div class="col">
            <input type="text" class="form-control" name="term" value="" placeholder="Buscar...">
        </div>
        <div class="col">
            <button class="btn btn-primary text-white me-4">Buscar</button>
            <a href="{{ route('projects.index') }}" class="btn btn-primary text-white">Volver a la lista</a>
        </div>
    </form> --}}
    <div class="d-flex flex-wrap justify-content-between align-items-start">
        @forelse ($projects as $project)
        {{-- <li class="list-group-item border-0 mb-3 shadow-sm">
            <a class="d-flex justify-content-between align-items-center text-decoration-none text-secondary" href="{{ route('projects.show', $project) }}">
                @if($project->image)
                <img src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
                @endif
                <span class="fw-bold">
                    {{ $project->title }}
                </span>
                <span class="text-black-50">
                    {{ $project->created_at->format('d/m/Y') }}
                </span>
            </a>
        </li> --}}
        <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 25rem">
            @if($project->image)
            <img src="/storage/{{ $project->image }}" style="height: 250px; object-fit: cover"  class="card-img-top mb-2" alt="{{ $project->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $project->title }}</h5>
                <span class="text-black-50">
                    {{ $project->created_at->format('d/m/Y') }}
                </span>
                <p class="card-text text-secondary text-truncate">{{ $project->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Mostrar mas</a>
                    @if($project->category_id)
                    <a href="{{ route('categories.show', $project->category) }}" class="badge bg-secondary text-decoration-none p-2">{{ $project->category->name }}</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <li class="list-group-item border-0 mb-3 shadow-sm">
            <span class="fw-bold">No hay proyectos para mostrar.</span>
        </li>
        @endforelse
    </div>
    {{ $projects->onEachSide(1)->links() }}
    
    @can('view-deleted-projects')
    <ul class="list-group">
        @foreach($deletedProjects as $deletedProject)
        <h4 class="mt-4">Proyectos Eliminados</h4>
        <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">
            {{ $deletedProject->title }}
            @can('restore', $deletedProject)
            <form method="POST" action="{{ route('projects.restore', $deletedProject) }}" class="d-inline">
                @csrf @method('PATCH')
                <button class="btn btn-sm btn-success">Restaurar</button>
            </form>
            @endcan
            @can('force-delete', $deletedProject)
            <form method="POST" 
            onsubmit="return confirm('Esta accion no se puede deshacer. Esta seguro de eliminar el proyecto?')"
            action="{{ route('projects.force-delete', $deletedProject) }}" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Eliminar Permanentemente</button>
        </form>
        @endcan
    </li>
    @endforeach
</ul>
@endcan
</div>
@endsection
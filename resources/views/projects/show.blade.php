@extends('layout')

@section('title', 'Portfolio | ' . $project->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            <div class="bg-white p-4 shadow rounded">
                @if($project->image)
                <img src="/storage/{{ $project->image }}" style="height: 250px; object-fit: cover"  class="card-img-top" alt="{{ $project->title }}">
                @endif
                <h1 class="display-4 text-left pb-2">{{ $project->title }}</h1>
                <p class="lead text-secondary">{{ $project->description }}</p>
                <p class="text-secondary"> {{ $project->category->name }}</p>
                <p class="text-black-50 m-1">Creado {{ $project->created_at->diffForHumans() }}</p>
                <p class="text-black-50 m-1">Editado {{ $project->updated_at->diffForHumans() }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('projects.index') }}">Volver</a>
                    @auth
                    <div class="btn-group btn-group-m">
                        @can('update', $project)
                        <a class="btn btn-primary rounded text-white m-3" href="{{ route('projects.edit', $project) }}">EDITAR</a>
                        @endcan
                        @can('delete', $project)
                        <a class="btn btn-danger rounded m-3" href="#" onclick="document.getElementById('delete-project').submit()">ELIMINAR</a>
                        <form class="d-none" id="delete-project" action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf @method('DELETE')
                        </form>
                        @endcan
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
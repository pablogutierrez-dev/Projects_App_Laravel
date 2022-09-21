@extends('layout')

@section('title', 'Editar Project')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">    
      @include('partials.validation-errors')
      <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('projects.update', $project) }}">
        @method('PATCH')
        <h1 class="display-5">EDITA EL PROYECTO</h1>
        <hr>
        @include('projects._form', ['btnText' => 'Actualizar'])
      </form>
    </div>
  </div>
</div>
@endsection
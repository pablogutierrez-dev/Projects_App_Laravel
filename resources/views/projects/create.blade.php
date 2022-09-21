@extends('layout')

@section('title', 'Crear un Proyecto')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">      
      @include('partials.validation-errors')
      
      <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('projects.store') }}">
        <h1 class="display-6 fw-bold text-center mb-3">CREA UN NUEVO PROYECTO</h1>
        <hr>
        @include('projects._form', ['btnText' => 'Guardar'])
      </form>
    </div>
  </div>
</div>
@endsection
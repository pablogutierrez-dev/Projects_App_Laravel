@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-lg-6">
      <h1 class="display-4 text-primary">PROJECTS APP</h1>
<<<<<<< HEAD
      <p class="lead text-secondary">App desarrollada para listar proyectos. Podras crear, guardar, actualizar y eliminar todos los proyectos que hayas creado, dentro de la cuenta.</p>
=======
      <p class="lead text-secondary">App desarrollada para listar proyectos. Podras crear, guardar, actualizar y eliminar todos los proyectos que hayas creado en tu cuenta.</p>
>>>>>>> 981b49037e905118eec16be0d936c4ba426245a7
      @guest
      <a class="btn btn-lg w-100 mb-3 btn-primary text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
      <a class="btn btn-lg w-100 mb-3 btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
      @else
      <div class="container border-0 rounded mb-3">
        <div class="row">
          <div class="col-12">
            <a class="btn btn-lg btn-primary text-white p-3" href="{{ route('projects.index') }}">Accede a la lista de proyectos</a>
          </div>
        </div>
      </div>
      @endguest
    </div>
    <div class="col-12 col-lg-6">
      <img class="img-fluid" src="/img/home.svg" alt="Home">
    </div>
  </div>
</div>
@endsection


{{--   @auth
  {{ auth()->user()->name }}
  @endauth --}}

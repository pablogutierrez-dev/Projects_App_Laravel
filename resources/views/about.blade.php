@extends('layout')

@section('title', 'Sobre Mi')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-lg-6">
      <img class="img-fluid" src="/img/about.svg" alt="Sobre Mi">
    </div>
    <div class="col-12 col-lg-6">
      <h1 class="display-4 text-primary">Sobre Mi</h1>
      <p class="lead">Me llamo Pablo Gutierrez. He creado esta web como proyecto de Laravel CRUD. Si te ha gustado y quieres ponerte en contacto conmigo, te dejo mi perfil de Linkedin y Github. Gracias!</p>
      <a class="btn btn-lg w-100 mb-3 btn-primary text-white" href="https://www.linkedin.com/in/pablo-guti%C3%A9rrez-mu%C3%B1oz-97b558247/" target="_blank">Linkedin</a>
      <a class="btn btn-lg w-100 mb-3 btn-outline-primary" href="https://github.com/pablogutierrez-dev" target="_blank">Github</a>
    </div>
  </div>
</div>
@endsection
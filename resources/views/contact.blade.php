@extends('layout')

@section('title', 'Contacto')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
      <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('messages.store') }}">
        @csrf
        <h1 class="display-4 text-center fw-bold">CONTACTO</h1>
        <hr>
        <div class="form-group mb-3">
          <label class="fw-bold" for="name">Nombre</label>
          <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label class="fw-bold" for="email">Correo Electronico</label>
          <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" type="text" name="email" id="email" placeholder="Correo electronico" value="{{ old('email') }}">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label class="fw-bold" for="subject">Asunto</label>
          <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror" type="text" name="subject" id="subject" placeholder="Asunto" value="{{ old('subject') }}">
          @error('subject')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label class="fw-bold" for="message">Mensaje</label>
          <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" name="content" id="message" placeholder="Mensaje...">{{ old('content') }}</textarea>
          @error('content')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <button class="btn btn-primary btn-lg text-white w-100">Enviar</button>
      </form>
    </div>
  </div>
</div>


@endsection
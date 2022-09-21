@extends('layout')

@section('title', 'Registrarse')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
      <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="display-4 text-center fw-bold">REGISTRARSE</h1>
        <hr>
        <div class="form-group mb-3">
          <label for="name" class="fw-bold">{{ __('Name') }}</label>
          <input id="name" type="text" class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="email" class="fw-bold">{{ __('Email') }}</label>
          <input id="email" type="email" class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" type="email" name="email" id="email" placeholder="Correo electronico" value="{{ old('email') }}" autocomplete="email">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="password" class="fw-bold">Contraseña</label>
          <input id="password" type="password" class="form-control bg-light shadow-sm @error('password') is-invalid @else border-0 @enderror" type="text" name="password" id="password" placeholder="Contraseña" value="{{ old('password') }}">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="password-confirm" class="fw-bold">{{ __('Confirm Password') }}</label>
          <input id="password-confirm" type="password" class="form-control bg-light shadow-sm @error('password') is-invalid @else border-0 @enderror" name="password_confirmation"
          placeholder="Confirmar Contraseña" autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary btn-lg text-white w-100 mb-2">
          {{ __('Register') }}
        </button>
      </form>
    </div>
  </div>
</div>
@endsection

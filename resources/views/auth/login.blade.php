@extends('layout')

@section('title', 'Iniciar Sesion')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
      <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="display-4 text-center fw-bold">INICIAR SESION</h1>
        <hr>
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
          <label for="password" class="fw-bold">{{ __('Password') }}</label>
          <input id="password" type="password" class="form-control bg-light shadow-sm @error('password') is-invalid @else border-0 @enderror" type="text" name="password" id="password" placeholder="Contraseña" value="{{ old('password') }}">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label fw-bold" for="remember">
            {{ __('Remember Me') }}
          </label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg text-white w-100 mb-2">
          {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
        <a class="btn btn-link w-100 text-decoration-none p-2" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
        @endif
      </form>
    </div>
  </div>
</div>
@endsection

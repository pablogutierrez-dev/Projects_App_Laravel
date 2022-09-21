<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      {{ config('app.name')}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="container mx-auto">
      <ul class="nav nav-pills d-flex justify-content-center">
        <li class="nav-item">
          <a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">{{ __('Home')  }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center {{ setActive('about') }}" href="{{ route('about') }}">{{ __('About') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}">{{ __('Projects') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive('contact') }}" href="{{ route('contact') }}">{{ __('Contact') }}</a>
        </li>
      </ul>
      <ul class="nav nav-pills d-flex justify-content-center">
        @guest
        <li class="nav-item">
          <a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ setActive('register') }}" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @else
        <div class="nav-item dropend">
          <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Hola, {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu">
            <li class="text-center">
              <a class="text-decoration-none mx-auto" href="{{ route('projects.index') }}">Lista de proyectos</a>
            </li>
            <li class="text-center">
              <a class="text-decoration-none mx-auto" href="#" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
          </li>
        </ul>
      </div>
      @endguest
    </ul>
  </div>
</div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <link rel="stylesheet" href="/css/app.css">
  <script defer src="/js/app.js"></script> --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <title>@yield('title')</title>
</head>
<body>
  <div id="app" class="d-flex flex-column justify-content-between h-screen">
    <header>
      @include('partials.nav')
      @include('partials.session-status')
    </header>
    <main class="py-4">
      @yield('content')
    </main>
    <footer class="bg-white text-black-50 text-center py-2 shadow">
      {{ config('app.name')}} | {{ date ('Y')}}
    </footer>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&family=PT+Sans&family=Source+Sans+Pro&display=swap');
  </style>
  <script src="{{ asset('js/random-team.js') }}"></script>

</head>

<body class="flex flex-col place-content-center place-items-center min-w-[768px] mt-[30vh]">
  <header class="flex place-content-center place-items-center flex-col">
    <div class="font-PT font-medium text-7xl text-primary mb-4 text-center">
      Database Laravel
    </div>
    <div class="text-primary font-Josefin font-medium tracking-wider text-2xl text-center">
      Example of Laravel Integration with Database
    </div>
  </header>
  @if (Route::has('login'))
    <div class="mt-20 flex flex-row justify-center gap-8 font-Josefin text-2xl text-secondary tracking-widest">
      @auth
        <a href="{{ url('/home') }}"
          class="hover:text-primary hover:border-b-primary border-transparent border-b border-dotted h-7 uppercase">Home</a>
      @else
        <a href="{{ route('login') }}"
          class="hover:text-primary hover:border-b-primary border-transparent border-b border-dotted h-7 uppercase">Log
          in</a>
        <span> / </span>
        @if (Route::has('register'))
          <a href="{{ route('register') }}"
            class="hover:text-primary hover:border-b-primary border-transparent border-b border-dotted h-7 uppercase">Register</a>
        @endif
      @endauth
    </div>
  @endif
</body>

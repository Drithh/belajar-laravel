<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&family=PT+Sans&family=Source+Sans+Pro&display=swap');
  </style>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
  <div class=" ">

    <!-- Page Heading -->
    <header class="mt-20 flex place-content-center place-items-center flex-col">
      <div class="font-PT font-medium text-6xl text-primary mb-4 text-center">
        {{ $header }}
      </div>
      <div class="text-primary font-Josefin font-medium tracking-wider text-xl text-center">
        {{ $text_header }}
      </div>
    </header>

    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div>
</body>

</html>

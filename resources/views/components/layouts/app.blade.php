<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facemilenio - {{ $title ?? '' }}</title>
  <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">

  {{-- Font family --}}
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  {{-- Icons --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  {{-- SASS file --}}
  @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col min-h-screen">
  <x-layouts.header />


  <main class="flex-1 flex gap-8 px-10">
    @auth
      <x-layouts.admin-aside />
    @endauth

    {{ $slot }}
  </main>

  <x-layouts.footer />

  @vite('resources/js/mobile_navbar.js')
</body>

</html>

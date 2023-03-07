<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facemilenio</title>

  {{-- Font family --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  {{-- SASS file --}}
  @vite(['resources/sass/app.scss'])
</head>

<body>
  <header class="header">
    <div class="header__container">
      <h1 class="header__logo">Facemilenio</h1>

      <nav class="header__nav">
        <a href="#">Landing</a>
        <a href="#">Login</a>
        <a href="#">Signup</a>
      </nav>
    </div>
  </header>

  @yield('content')

  <footer class="footer">
    <h3 class="footer__tittle">Facemilenio</h3>
    <p>Copyright 2023</p>
  </footer>
</body>

</html>

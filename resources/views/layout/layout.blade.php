<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <nav>
    <h1>Logo</h1>

    <div>
      <a href="#">Home</a>
    </div>
  </nav>

  @yield('content')


</body>

</html>

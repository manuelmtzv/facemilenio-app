<header class="header">
  <div class="header__container">
    <h1 class="header__logo">Facemilenio</h1>

    <nav class="header__nav">
      @auth
        <a href="{{ route('feed') }}">Home</a>
        <a href="#">Logout</a>
      @endauth

      @guest
        <a href="{{ route('landing') }}">Landing</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Signup</a>
      @endguest
    </nav>
  </div>
</header>

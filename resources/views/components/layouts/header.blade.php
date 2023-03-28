<header class="header">
  <div class="header__container">
    <h1 class="header__logo">Facemilenio</h1>

    <nav class="header__nav">
      @auth
        <a href="{{ route('feed') }}">Home</a>

        <form class="logout" action="{{ route('logout') }}" method="POST">
          @csrf
          <button>Logout</button>
        </form>
      @endauth

      @guest
        <a href="{{ route('landing') }}">Landing</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Signup</a>
      @endguest
    </nav>
  </div>
</header>

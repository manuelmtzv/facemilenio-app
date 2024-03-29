<header class="bg-[#41644A] text-[#F0F0F0] flex py-8 shadow-lg">
  <div class="content flex justify-between items-center">
    <h1 class="logo">Facemilenio</h1>

    <nav class="items-center gap-5 hidden lg:flex">
      @auth
        <a href="{{ route('feed') }}">Feed</a>

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="button">Logout</button>
        </form>
      @endauth

      @guest
        <a href="{{ route('landing') }}">Landing</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Signup</a>
      @endguest
    </nav>

    <nav class="lg:hidden rotate-90 font-bold cursor-pointer mobile-nav-button button text-center !pt-1">
      |||
    </nav>
  </div>
</header>

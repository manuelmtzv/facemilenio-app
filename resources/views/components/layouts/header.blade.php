<header class="bg-gray-300 flex py-8 px-10">
  <div class="flex justify-between items-center w-full">
    <h1 class="text-3xl font-bold">Facemilenio</h1>

    <nav class="items-center gap-5 hidden md:flex">
      @auth
        <a href="{{ route('feed') }}">Home</a>

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

    <nav class="md:hidden rotate-90 tracking-wider font-bold cursor-pointer mobile-nav">
      |||
    </nav>
  </div>
</header>

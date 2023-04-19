<header class="bg-gray-300 flex py-4 px-10">
  <div class="flex justify-between items-center w-full">
    <h1 class="text-3xl font-bold">Facemilenio</h1>

    <nav class="items-center gap-5 hidden lg:flex">
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

    <nav class="lg:hidden rotate-90 font-bold cursor-pointer mobile-nav button text-center !pt-1">
      |||
    </nav>
  </div>
</header>

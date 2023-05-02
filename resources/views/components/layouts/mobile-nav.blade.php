<div
     class="mobile-nav fixed w-[70%] top-0 bottom-0 admin-aside ease-in-out duration-300 left-[-100%] bg-inherit overflow-y-auto ">
  <div class="bg-[#41644A]
  flex py-8 px-10">
    <h1 class="logo">Facemilenio</h1>
  </div>

  <nav class="flex flex-col px-10 py-6 gap-4">
    @auth
      <div class="routes-group">
        <h4 class="font-bold">Navigation Routes:</h4>
        <a class="aside-link" href="{{ route('feed') }}">Home</a>
      </div>

      @if (auth()->user()->role->name === 'User')
      @else
        <div class="routes-group">
          <h4 class="font-bold">CRUD Routes:</h4>
          <x-utilities.admin-links />
        </div>
      @endif

      <div class="routes-group">
        <h4 class="font-bold">Extra Routes:</h4>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="button">Logout</button>
        </form>
      </div>
    @endauth

    @guest
      <div class="routes-group">
        <h4 class="font-bold">Guest Routes:</h4>
        <a class="aside-link" href="{{ route('landing') }}">Landing</a>
        <a class="aside-link" href="{{ route('login') }}">Login</a>
        <a class="aside-link" href="{{ route('register') }}">Signup</a>
      </div>
    @endguest
  </nav>
</div>

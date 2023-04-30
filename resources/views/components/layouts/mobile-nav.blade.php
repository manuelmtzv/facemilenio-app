<div class="mobile-nav fixed w-[70%] top-0 bottom-0 admin-aside ease-in-out duration-200 left-[-100%] bg-gray-50 ">
  <div class="bg-gray-300
  flex py-8 px-10">
    <h1 class="text-3xl font-bold">Facemilenio</h1>
  </div>

  <nav class="flex flex-col px-10">
    @auth
      <a class="aside-link" href="{{ route('feed') }}">Home</a>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="button">Logout</button>
      </form>
    @endauth

    @guest
      <a class="aside-link" href="{{ route('landing') }}">Landing</a>
      <a class="aside-link" href="{{ route('login') }}">Login</a>
      <a class="aside-link" href="{{ route('register') }}">Signup</a>
    @endguest
  </nav>
</div>

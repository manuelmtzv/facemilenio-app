<aside class="hidden w-full max-w-[10rem] py-3 bg-transparent lg:block">

  <nav class="flex flex-col">
    @auth
      @if (auth()->user()->role->name === 'User')
        <p>You are user</p>
      @elseif (auth()->user()->role->name === 'Admin')
        <x-utilities.admin-links />
      @endif
    @endauth
  </nav>
</aside>

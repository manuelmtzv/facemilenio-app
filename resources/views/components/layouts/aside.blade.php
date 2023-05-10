<aside class="hidden w-full max-w-[14rem] pb-3 bg-transparent lg:block view !bg-[#D6E8DB]">

  <nav class="flex flex-col">
    @auth
      @if (auth()->user()->role->name === 'User')
        <div class="routes-group">
          <h4 class="font-bold">Navigation Routes</h4>
          <a class="aside-link" href="{{ route('feed') }}">Feed</a>
          <a class="aside-link" href="{{ route('profile', auth()->user()->id) }}">Profile</a>
          <a class="aside-link" href="{{ route('user.friends.index') }}">Friends</a>
          <a class="aside-link" href="{{ route('user.notifications.index') }}">Notifications</a>
        </div>
      @else
        <div class="routes-group">
          <h4 class="font-bold">CRUD Routes</h4>
          <x-utilities.admin-links />
        </div>
      @endif
    @endauth
  </nav>
</aside>

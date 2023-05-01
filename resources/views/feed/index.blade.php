<x-layouts.app title="Feed">
  <div class="feed container">
    <div class="feed__container">
      @if (auth()->user()->role->name === 'User')
        <aside class="feed__aside">
          <x-sections.notifications :notifications="$notifications" />

          <x-sections.friends :friends="$friends" />
        </aside>

        <div class="feed__main">
          <x-sections.activities :activities="$activities" />
        </div>
      @else
        <p>Admin Dashboard</p>
      @endif
    </div>
  </div>
</x-layouts.app>

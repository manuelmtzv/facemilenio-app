<x-layouts.app title="Feed">
  <div class="feed container">
    <div class="feed__container flex justify-center items-center h-full">
      @if (auth()->user()->role->name === 'User')
        <p class="text-semibold text-2xl">User Dashboard</p>
      @else
        <p class="text-semibold text-2xl">Admin Dashboard</p>
      @endif
    </div>
  </div>
</x-layouts.app>

<x-layouts.app title="Friends">
  <div class=" container view height-fit flex flex-col gap-5">
    <div class="flex flex-col gap-4">
      <h2 class="text-2xl font-bold">Friends</h2>

      @if (count(auth()->user()->allFriends()) > 0)
        <x-sections.users :users="auth()
            ->user()
            ->allFriends()" />
      @else
        <p>No friends</p>
      @endif
    </div>

    <div class="flex flex-col gap-4 ">
      <h2 class="text-xl font-bold">
        All users
      </h2>
      <x-sections.users :users="$users" />
    </div>
  </div>
</x-layouts.app>

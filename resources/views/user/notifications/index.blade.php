<x-layouts.app title="Notifications">
  <div class=" container view height-fit flex flex-col gap-5">
    <h2 class="text-2xl font-semibold">Notifications</h2>


    <x-sections.friendship-requests :pendingFriends="$pendingFriends" />
  </div>
</x-layouts.app>

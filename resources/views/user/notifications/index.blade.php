<x-layouts.app title="Notifications">
  <div class=" container view height-fit flex flex-col gap-5">
    Notifications


    <x-sections.friendship-requests :pendingFriends="$pendingFriends" />
  </div>
</x-layouts.app>

<aside
       class="fixed w-[70%] top-0 bottom-0 admin-aside ease-in-out duration-200 left-[-100%] bg-gray-50 md:block md:static md:w-auto md:py-3 md:bg-transparent overflow-y-auto">
  <div class="bg-gray-300 flex py-8 px-10 md:hidden">
    <h1 class="text-3xl font-bold">Facemilenio</h1>
  </div>

  <nav class="flex flex-col">
    <a class="aside-link" href="{{ route('activities.index') }}">Activities</a>
    <a class="aside-link" href="{{ route('cities.index') }}">Cities</a>
    <a class="aside-link" href="{{ route('comments.index') }}">Comments</a>
    <a class="aside-link" href="{{ route('countries.index') }}">Countries</a>
    <a class="aside-link" href="{{ route('friends.index') }}">Friends</a>
    <a class="aside-link" href="{{ route('genders.index') }}">Genders</a>
    <a class="aside-link" href="{{ route('locations.index') }}">Locations</a>
    <a class="aside-link" href="{{ route('notifications.index') }}">Notifications</a>
    <a class="aside-link" href="{{ route('notification-types.index') }}">Notifications Types</a>
    <a class="aside-link" href="{{ route('permissions.index') }}">Permissions</a>
    <a class="aside-link" href="{{ route('roles.index') }}">Roles</a>
    <a class="aside-link" href="{{ route('role-permissions.index') }}">Role Permissions</a>
    <a class="aside-link" href="{{ route('users.index') }}">Users</a>
  </nav>
</aside>

<aside class="block static w-auto py-3 bg-transparent overflow-y-auto">

  <nav class="flex flex-col">
    @auth
      @if (auth()->user()->role->name === 'User')
        <p>You are user</p>
      @elseif (auth()->user()->role->name === 'Admin')
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
      @endif
    @endauth
  </nav>
</aside>

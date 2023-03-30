<x-layouts.app title="Landing" meta-description="Landing meta description">
  <div class="landing container resources">
    {{-- <div class="landing__container">
      <div class="landing__main_image">
        <img src="" alt="">
      </div>

      <div class="landing__main_features">
        <div class="landing__feature">
          <img src="" alt="">
          <p></p>
        </div>
        <div class="landing__feature">
          <img src="" alt="">
          <p></p>
        </div>
        <div class="landing__feature">
          <img src="" alt="">
          <p></p>
        </div>
      </div>
    </div> --}}

    <nav>
      <a href="{{ route('activities.index') }}">Activities</a>
      <a href="{{ route('cities.index') }}">Cities</a>
      <a href="{{ route('comments.index') }}">Comments</a>
      <a href="{{ route('countries.index') }}">Countries</a>
      <a href="{{ route('friends.index') }}">Friends</a>
      <a href="{{ route('genders.index') }}">Genders</a>
      <a href="{{ route('locations.index') }}">Locations</a>
      <a href="{{ route('notifications.index') }}">Notifications</a>
      <a href="{{ route('notification-types.index') }}">Notifications Types</a>
      <a href="{{ route('permissions.index') }}">Permissions</a>
      <a href="{{ route('roles.index') }}">Roles</a>
      <a href="{{ route('role-permissions.index') }}">Role Permissions</a>
      <a href="{{ route('users.index') }}">Users</a>
    </nav>

  </div>
</x-layouts.app>

<x-layouts.app>
  <div class="feed container">
    <div class="feed__container">
      <aside class="feed__aside">
        <div class="notifications">
          <h2 class="notifications__title">
            Notifications
          </h2>
          <div class="notifications__container">
            @foreach ($notifications as $notification)
              @include('activities.notification');
            @endforeach
          </div>
        </div>

        <div class="friends">
          <h2 class="friends__title">
            Friends
          </h2>
          <div class="friends__container">
            @foreach ($friends as $friend)
              @include('activities.friend');
            @endforeach
          </div>
        </div>
      </aside>

      <div class="feed__main">
        <div class="activities">
          <h2 class="activities__title">
            Activities
          </h2>

          <div class="activities__container">
            @foreach ($notifications as $notification)
              @include('activities.activity');
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>

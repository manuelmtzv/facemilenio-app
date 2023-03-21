<x-layouts.app>
  <div class="feed container">
    <div class="feed__container">
      <aside class="feed__aside">
        <div class="notifications">
          <h2 class="notifications__title">
            Notifications
          </h2>
          {{ $notifications }}
        </div>

        <div class="friends">
          <h2 class="friends__title">
            Friends
          </h2>
          {{ $friends }}
        </div>
      </aside>

      <div class="feed__main">
        <div class="activities">
          <h2 class="activities__title">
            Activities
          </h2>

          {{ $activities }}
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>

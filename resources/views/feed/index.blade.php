<x-layouts.app title="Feed">
  <div class="feed container">
    <div class="feed__container">
      <aside class="feed__aside">
        <x-sections.notifications :notifications="$notifications" />

        <x-sections.friends :friends="$friends" />
      </aside>

      <div class="feed__main">
        <x-sections.activities :activities="$activities" />
      </div>
    </div>
  </div>
</x-layouts.app>

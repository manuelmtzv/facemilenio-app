<div class="notifications">
  <h2 class="notifications__title">
    Notifications
  </h2>
  <div class="notifications__container">
    @forelse ($notifications as $notification)
      {{ $notification }}
    @empty
      <p>No notifications</p>
    @endforelse
  </div>
</div>

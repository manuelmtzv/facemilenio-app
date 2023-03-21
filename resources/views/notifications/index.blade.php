<div class="notifications__container">
  @forelse ($notifications as $notification)
    @include('activities.notification');
  @empty
    <p>No Notifications</p>
  @endforelse
</div>

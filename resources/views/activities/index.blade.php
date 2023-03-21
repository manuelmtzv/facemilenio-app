<div class="activities__container">
  @forelse ($activities as $activity)
    @include('activities.activity');
  @empty
    <p>No activities</p>
  @endforelse
</div>

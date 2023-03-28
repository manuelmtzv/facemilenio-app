<div class="activities">
  <h2 class="activities__title">
    Activities
  </h2>
  <div class="activities__container">
    @forelse ($activities as $activity)
      {{ $activity }}
    @empty
      <p>No activities</p>
    @endforelse
  </div>
</div>

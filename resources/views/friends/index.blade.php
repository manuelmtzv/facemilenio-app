<div class="friends__container">
  @forelse ($friends as $friend)
    @include('activities.friend');
  @empty
    <p>No friends</p>
  @endforelse
</div>

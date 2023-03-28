<div class="friends">
  <h2 class="friends__title">
    Friends
  </h2>
  <div class="friends__container">
    @forelse ($friends as $friend)
      <div class="friends__element">
        <a href="#">{{ $friend->username }}</a>
      </div>
    @empty
      <p>No friends</p>
    @endforelse
  </div>
</div>

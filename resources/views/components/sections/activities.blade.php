<div class="flex flex-col gap-4">
  <h2 class="text-xl">Activities: </h2>

  <section class="flex flex-col gap-4">
    @forelse ($activities as $activity)
      <article>
        <a class="flex flex-col gap-2 shadow-md rounded-md p-4 bg-[#fdf6e9] hover:bg-[#fffbf4] text-black"
           href="{{ route('user.activities.show', $activity->id) }}">
          <h2 class="text-xl font-semibold">{{ $activity->title }}</h2>
          <p class="text-justify">{{ $activity->content }}</p>

          <div class="flex justify-between items-center">
            <p class="font-semibold">Created at: <span class="font-normal">{{ $activity->created_at }}</span></p>
            <p class="font-semibold">Author: <span class="font-normal">{{ $activity->user->username }}</span></p>
          </div>
        </a>
      </article>
    @empty
      <p>No activities</p>
    @endforelse
  </section>
</div>

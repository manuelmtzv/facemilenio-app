<x-layouts.app title="activities" meta-description="">
  <div class="container">

    @if (auth()->user()->role->name == 'Admin')
      <x-utilities.show model-name="activity" back-route="activities.index" :entity="$entity" :keys="$keys" />
    @else
      <section class="flex flex-col gap-4
      ">
        <article class="flex flex-col gap-4">
          <header class="flex justify-between items-center">
            <h2><span class="font-bold">Title:</span> {{ $entity->title }}</h2>

            <p><span class="font-bold">Author: </span>{{ $entity->user->username }}</p>
          </header>

          <div>
            <span class="font-bold">Content:</span>
            <p class="text-justify">{{ $entity->content }}</p>
          </div>

          <p><span class="font-bold">Date: </span>{{ $entity->created_at }}</p>
        </article>

        <x-forms.create-comment :activity-id="$entity->id" />

        <div class="flex flex-col gap-4">
          <h3 class="font-bold">Comments</h3>
          @if (count($entity->comments) > 0)
            @foreach ($entity->comments as $comment)
              <article class="flex flex-col gap-2 shadow-md rounded-md p-4 bg-[#fdf6e9] text-black">
                <header class="flex items-center justify-between">
                  <p><span class="font-bold">User: </span>{{ $comment->user->username }}</p>

                  <p><span class="font-bold">Date: </span>{{ $comment->created_at }}</p>
                </header>
                <p>{{ $comment->content }}</p>
              </article>
            @endforeach
          @else
            <p class="text-center">No comments to show</p>
          @endif
        </div>
      </section>
    @endif

  </div>
</x-layouts.app>

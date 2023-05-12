<div class="flex flex-col gap-4 ">
  <h3 class="text-xl font-semibold">Friend requests:</h3>

  <section class="grid grid-cols-2 gap-4">
    @if (count($pendingFriends) > 0)
      @foreach ($pendingFriends as $pendingFriend)
        <article class="flex justify-evenly items-center gap-3 font-semibold text-center p-2 bg-[#d6e8db] rounded-sm">
          <div class="flex justify-center items-center gap-2">
            <img class="w-10"
                 src="{{ $pendingFriend->user->gender->name === 'Male' ? '/images/hombre.png' : '/images/mujer.png' }}"
                 alt="Male icon">
            <p>Name: <span
                    class="font-normal">{{ $pendingFriend->user->name . ' ' . $pendingFriend->user->surname }}</span>
            </p>
          </div>

          <nav class="flex gap-4">
            <form action="{{ route('user.friendship.accept', $pendingFriend) }}" method="POST">
              @csrf
              @method('PATCH')
              <button class="button !bg-green-300" type="submit">Accept</button>
            </form>
            <form action="{{ route('user.friendship.decline', $pendingFriend) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="button !bg-red-400" type="submit">Decline</button>
            </form>
          </nav>

        </article>
      @endforeach
    @else
      <p>No friend requests to show.</p>
    @endif
  </section>
</div>

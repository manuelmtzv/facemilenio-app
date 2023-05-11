<article class="flex flex-col gap-4 ">
  @foreach ($pendingFriends as $pendingFriend)
    <article class="flex justify-center items-center gap-3 font-semibold text-center p-2 bg-[#d6e8db] rounded-sm">
      <div class="flex flex-col">
        <img class="w-10"
             src="{{ $pendingFriend->user->gender->name === 'Male' ? '/images/hombre.png' : '/images/mujer.png' }}"
             alt="Male icon">
        <p>Name: <span class="font-normal">{{ $pendingFriend->user->name . ' ' . $pendingFriend->user->surname }}</span>
        </p>
      </div>
    </article>
  @endforeach
</article>

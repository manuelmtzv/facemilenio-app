<div class="flex flex-col gap-4 ">
  @if (count($users) > 0)
    <div
         class="grid grid-cols-1 gap-2 shadow-md rounded-md p-4 bg-[#fff4e0] md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach ($users as $user)
        <a href="{{ route('profile', $user->id) }}">
          <article class="flex justify-center items-center gap-3 font-semibold text-center p-2 bg-[#d6e8db] rounded-sm">
            <img class="w-10" src="{{ $user->gender->name === 'Male' ? '/images/hombre.png' : '/images/mujer.png' }}"
                 alt="Male icon">
            <p>Name: <span class="font-normal">{{ $user->name . ' ' . $user->surname }}</span></p>
          </article>
        </a>
      @endforeach
    </div>
  @else
    <p>No users to show.</p>
  @endif
</div>

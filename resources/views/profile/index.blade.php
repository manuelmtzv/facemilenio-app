<x-layouts.app title="Feed">
  <div class="profile container view height-fit flex flex-col gap-5">
    <div class="flex flex-col gap-3 p-4 bg-[#FFF4E0] rounded-md shadow-md">
      <h2 class="text-2xl font-bold">User Profile</h2>

      <section class="flex flex-col gap-4 md:flex-row">
        <div class="flex justify-center">
          <img class="max-w-[10rem]"
               src="{{ $user->gender->name === 'Male' ? '/images/hombre.png' : '/images/mujer.png' }}" alt="Male icon">
        </div>

        <article class="grid grid-cols-2 gap-2 w-full">
          <div class="flex flex-col gap-2 justify-between font-semibold">
            <p>Name: <span class="font-normal">{{ $user->name . ' ' . $user->surname }}</span></p>
            <p>Email: <span class="font-normal">{{ $user->email }}</span></p>
            @if ($user->location)
              <p>Location: <span
                      class="font-normal">{{ $user->location->city->name . ', ' . $user->location->country->name }}</span>
              </p>
            @endif
          </div>

          <div class="flex flex-col gap-2 justify-between font-semibold">
            <p>Gender: <span class="font-normal">{{ $user->gender->name }}</span></p>
            <p>Birthdate: <span class="font-normal">{{ $user->birthdate }}</span></p>
            <p>Created at: <span class="font-normal">{{ $user->created_at }}</span></p>
          </div>
        </article>
      </section>

      <p class="text-justify">{{ $user->biography }}</p>
    </div>

    @if (!auth()->user()->isFriendWith($user) && auth()->user()->id != $user->id)
      <form class="flex" action="{{ route('user.friendship', $user) }}" method="post">
        @csrf
        <button class="button ml-auto !bg-green-300" type="submit">Send Friend Request</button>
      </form>
    @endif


    <section>
      {{-- Listado de actividades --}}
      <x-sections.activities :activities="$activities" />
    </section>
  </div>
</x-layouts.app>

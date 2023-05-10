<x-layouts.app title="Feed">
  <div class=" container view height-fit flex flex-col gap-5">
    <div class="flex flex-col gap-4 p-4 bg-[#FFF4E0] rounded-md shadow-md">
      <h2 class="text-2xl font-bold">Friends</h2>

      @if (count(auth()->user()->friends) > 0)
        {{ auth()->user()->friends }}
      @else
        <p>No friends</p>
      @endif
    </div>

    <section>
      {{-- Listado de usuarios --}}
    </section>
  </div>
</x-layouts.app>

<x-layouts.app title="Feed">
  <div class="feed container view height-fit">
    <div class="feed__container flex flex-col gap-5">
      @if (auth()->user()->role->name === 'User')
        <div class="p-4 rounded-md shadow-md bg-[#fff4e0]">
          <h2 class="font-bold text-2xl">What do you have to share?</h2>

          {{-- Formulario para crear posts --}}
          <x-forms.create-activity />
        </div>

        {{-- Listado de actividades --}}
        <x-sections.activities :activities="$activities" />
      @else
        <p class="text-semibold text-2xl">Admin Dashboard</p>
      @endif
    </div>
  </div>
</x-layouts.app>

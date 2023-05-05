<x-layouts.app title="Feed">
  <div class="feed container">
    <div class="feed__container flex flex-col">
      @if (auth()->user()->role->name === 'User')
        <h2 class="font-bold text-2xl">What do you have to share?</h2>

        {{-- Formulario para crear posts --}}
        <x-forms.create-activity />

        {{-- Listado de actividades --}}
        <x-sections.activities :activities="$activities" />
      @else
        <p class="text-semibold text-2xl">Admin Dashboard</p>
      @endif
    </div>
  </div>
</x-layouts.app>

<x-layouts.app title="Locations" meta-description="">
  <div class="container">
    <h1>Locations</h1>

    <x-utilities.table table-name="Locations" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

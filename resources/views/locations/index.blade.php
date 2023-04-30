<x-layouts.app title="Locations" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Locations" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

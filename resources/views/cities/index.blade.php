<x-layouts.app title="Cities" meta-description="">
  <div class="container">
    <h1>Cities</h1>

    <x-utilities.table table-name="Cities" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

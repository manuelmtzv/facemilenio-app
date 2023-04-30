<x-layouts.app title="Cities" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Cities" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

<x-layouts.app title="Activities" meta-description="">
  <div class="crud-container">
    <x-utilities.table table-name="Activities" :values="$values" :keys="$keys" />

    <a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

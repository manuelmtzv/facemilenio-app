<x-layouts.app title="Cities" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Cities" :values="$values" :keys="$keys" />

    <x-utilities.home-button />
  </div>
</x-layouts.app>

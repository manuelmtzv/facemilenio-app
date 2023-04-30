<x-layouts.app title="Users" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Users" :values="$values" :keys="$keys" />

    <x-utilities.home-button />
  </div>
</x-layouts.app>

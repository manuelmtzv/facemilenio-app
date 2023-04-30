<x-layouts.app title="Countries" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Countries" :values="$values" :keys="$keys" />

    <x-utilities.home-button />
  </div>
</x-layouts.app>

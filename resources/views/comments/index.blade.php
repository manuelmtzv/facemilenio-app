<x-layouts.app title="Comments" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Comments" :values="$values" :keys="$keys" />

    <x-utilities.home-button />
  </div>
</x-layouts.app>

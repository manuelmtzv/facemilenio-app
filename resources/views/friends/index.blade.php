<x-layouts.app title="Friends" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Friends" :values="$values" :keys="$keys" />

    <x-utilities.home-button />
  </div>
</x-layouts.app>

<x-layouts.app title="locations" meta-description="">
  <div class="container">

    <x-utilities.show model-name="location" back-route="locations.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

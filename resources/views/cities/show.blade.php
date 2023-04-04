<x-layouts.app title="cities" meta-description="">
  <div class="container">

    <x-utilities.show model-name="city" back-route="cities.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

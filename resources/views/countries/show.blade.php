<x-layouts.app title="countries" meta-description="">
  <div class="container">

    <x-utilities.show model-name="country" back-route="countries.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

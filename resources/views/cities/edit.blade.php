<x-layouts.app title="cities" meta-description="">
  <div class="container">

    <x-forms.edit model-name="cities" back-route="cities.index" :keys="$keys" :column-types="$columnTypes" :record="$record" />

  </div>
</x-layouts.app>

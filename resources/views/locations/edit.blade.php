<x-layouts.app title="locations" meta-description="">
  <div class="container">

    <x-forms.edit model-name="locations" back-route="locations.index" :keys="$keys" :column-types="$columnTypes"
                  :record="$record" />

  </div>
</x-layouts.app>

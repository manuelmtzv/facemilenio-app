<x-layouts.app title="countries" meta-description="">
  <div class="container">

    <x-forms.edit model-name="countries" back-route="countries.index" :keys="$keys" :column-types="$columnTypes"
                  :record="$record" />

  </div>
</x-layouts.app>

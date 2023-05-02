<x-layouts.app title="activities" meta-description="">
  <div class="container">

    <x-forms.edit model-name="activities" back-route="activities.index" :keys="$keys" :column-types="$columnTypes"
                  :record="$record" />

  </div>
</x-layouts.app>

<x-layouts.app title="notifications" meta-description="">
  <div class="container">

    <x-forms.edit model-name="notifications" back-route="notifications.index" :keys="$keys" :column-types="$columnTypes"
                  :record="$record" />

  </div>
</x-layouts.app>

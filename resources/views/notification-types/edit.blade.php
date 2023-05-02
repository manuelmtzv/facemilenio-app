<x-layouts.app title="notification-types" meta-description="">
  <div class="container">

    <x-forms.edit model-name="notification-types" back-route="notification-types.index" :keys="$keys"
                  :column-types="$columnTypes" :record="$record" />

  </div>
</x-layouts.app>

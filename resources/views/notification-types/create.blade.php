<x-layouts.app title="notification-types" meta-description="">
  <div class="container">

    <x-forms.create model-name="notification-types" back-route="notifications-types.index" :keys="$keys"
                    :column-types="$columnTypes" />

  </div>
</x-layouts.app>

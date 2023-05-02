<x-layouts.app title="permissions" meta-description="">
  <div class="container">

    <x-forms.edit model-name="permissions" back-route="permissions.index" :keys="$keys" :column-types="$columnTypes"
                  :record="$record" />

  </div>
</x-layouts.app>

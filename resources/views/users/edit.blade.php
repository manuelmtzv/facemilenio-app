<x-layouts.app title="users" meta-description="">
  <div class="container">

    <x-forms.edit model-name="users" back-route="users.index" :keys="$keys" :column-types="$columnTypes" :record="$record" />

  </div>
</x-layouts.app>

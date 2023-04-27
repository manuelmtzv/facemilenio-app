<x-layouts.app title="users" meta-description="">
  <div class="container">

    <x-forms.create model-name="users" back-route="users.index" :keys="$keys" :column-types="$columnTypes" />

  </div>
</x-layouts.app>

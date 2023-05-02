<x-layouts.app title="friends" meta-description="">
  <div class="container">

    <x-forms.edit model-name="friends" back-route="friends.index" :keys="$keys" :column-types="$columnTypes" :record="$record" />

  </div>
</x-layouts.app>

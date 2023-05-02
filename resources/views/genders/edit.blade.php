<x-layouts.app title="genders" meta-description="">
  <div class="container">

    <x-forms.edit model-name="genders" back-route="genders.index" :keys="$keys" :column-types="$columnTypes" :record="$record" />

  </div>
</x-layouts.app>

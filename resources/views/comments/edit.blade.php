<x-layouts.app title="comments" meta-description="">
  <div class="container">

    <x-forms.edit model-name="comments" back-route="comments.index" :keys="$keys" :column-types="$columnTypes"
                  :record="$record" />

  </div>
</x-layouts.app>

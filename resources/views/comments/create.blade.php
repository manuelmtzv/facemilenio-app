<x-layouts.app title="comments" meta-description="">
  <div class="container">

    <x-forms.create model-name="comments" back-route="comments.index" :keys="$keys" :column-types="$columnTypes" />

  </div>
</x-layouts.app>

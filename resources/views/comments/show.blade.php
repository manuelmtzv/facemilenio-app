<x-layouts.app title="comments" meta-description="">
  <div class="container">

    <x-utilities.show model-name="comment" back-route="comments.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

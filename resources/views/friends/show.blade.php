<x-layouts.app title="friends" meta-description="">
  <div class="container">

    <x-utilities.show model-name="friend" back-route="friends.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

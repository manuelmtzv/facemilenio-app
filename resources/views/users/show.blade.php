<x-layouts.app title="users" meta-description="">
  <div class="container">

    <x-utilities.show model-name="user" back-route="users.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

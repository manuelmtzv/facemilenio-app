<x-layouts.app title="notifications" meta-description="">
  <div class="container">

    <x-utilities.show model-name="notification" back-route="notifications.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

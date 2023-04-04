<x-layouts.app title="activities" meta-description="">
  <div class="container">

    <x-utilities.show model-name="activity" back-route="activities.index" :entity="$entity" :keys="$keys" />

  </div>
</x-layouts.app>

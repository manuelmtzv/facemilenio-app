<x-layouts.app title="Notification-Types" meta-description="">
  <div class="container">
    <h1>Notification-Types</h1>

    <x-utilities.table table-name="Notification-Types" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

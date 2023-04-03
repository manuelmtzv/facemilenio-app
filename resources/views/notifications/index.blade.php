<x-layouts.app title="Notifications" meta-description="">
  <div class="container">
    <h1>Notifications</h1>

    <x-utilities.table table-name="Notifications" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

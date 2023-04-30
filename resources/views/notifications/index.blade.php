<x-layouts.app title="Notifications" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Notifications" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

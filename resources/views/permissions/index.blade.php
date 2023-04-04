<x-layouts.app title="Permissions" meta-description="">
  <div class="container">

    <x-utilities.table table-name="Permissions" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

<x-layouts.app title="Roles" meta-description="">
  <div class="container">

    <x-utilities.table table-name="Roles" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

<x-layouts.app title="Role-Permissions" meta-description="">
  <div class="container">

    <x-utilities.table table-name="Role-Permissions" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

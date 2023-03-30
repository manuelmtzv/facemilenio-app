<x-layouts.app title="Roles-Permission" meta-description="">
  <div class="container">
    <h1>Roles-Permission</h1>

    <x-utilities.table table-name="Roles-Permission" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

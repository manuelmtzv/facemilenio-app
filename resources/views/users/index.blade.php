<x-layouts.app title="Users" meta-description="">
  <div class="container">

    <x-utilities.table table-name="Users" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

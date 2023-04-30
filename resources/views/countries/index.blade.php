<x-layouts.app title="Countries" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Countries" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

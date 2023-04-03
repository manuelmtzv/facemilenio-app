<x-layouts.app title="Countries" meta-description="">
  <div class="container">
    <h1>Countries</h1>

    <x-utilities.table table-name="Countries" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

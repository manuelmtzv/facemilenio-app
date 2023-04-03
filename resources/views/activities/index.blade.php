<x-layouts.app title="Activities" meta-description="">
  <div class="container">
    <h1>Activities</h1>

    <x-utilities.table table-name="Activities" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

<x-layouts.app title="Activities" meta-description="">
  <div class="container">

    <x-utilities.table table-name="Activities" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

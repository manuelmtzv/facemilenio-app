<x-layouts.app title="Comments" meta-description="">
  <div class="container">

    <x-utilities.table table-name="Comments" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

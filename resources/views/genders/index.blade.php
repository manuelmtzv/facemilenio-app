<x-layouts.app title="Genders" meta-description="">
  <div class="crud-container">

    <x-utilities.table table-name="Genders" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

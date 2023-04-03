<x-layouts.app title="Genders" meta-description="">
  <div class="container">
    <h1>Genders</h1>

    <x-utilities.table table-name="Genders" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

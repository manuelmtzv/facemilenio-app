<x-layouts.app title="Friends" meta-description="">
  <div class="container">
    <h1>Friends</h1>

    <x-utilities.table table-name="Friends" :values="$values" :keys="$keys" />

    <br><a href={{ route('landing') }}>Home</a>
  </div>
</x-layouts.app>

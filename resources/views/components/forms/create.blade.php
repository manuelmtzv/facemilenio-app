<div class="flex flex-col gap-5 py-3 mt-2">
  <h1 class="capitalize text-2xl font-semibold pb-2 border-b border-gray-300">{{ $modelName }} -> Create </h1>


  <div class="w-full">
    <form class="flex flex-col gap-4 px-1" action="">
      @foreach ($keys as $key)
        <label class="capitalize flex flex-col" for={{ $key }}>
          {{ $key }}
          <input class="border p-2 rounded-md" type="text" name={{ $key }}>
        </label>
      @endforeach

      <button class="add-entry">Add entry</button>
    </form>
  </div>

  <a class="button w-min !bg-gray-200 hover:!bg-gray-300" href="{{ URL::previous() }}">
    Return
  </a>

</div>

<div class="flex flex-col gap-5 py-3 mt-2">
  <h1 class="capitalize text-2xl font-semibold pb-2 border-b border-gray-300">{{ $modelName }} -> Create </h1>

  {{ dd($keys) }}

  <div class="w-full">
    <form action="">
      @foreach ($keys as $key)
      @endforeach
    </form>
  </div>

  <a class="button w-min !bg-gray-200 hover:!bg-gray-300" href="{{ URL::previous() }}">
    Return
  </a>

</div>

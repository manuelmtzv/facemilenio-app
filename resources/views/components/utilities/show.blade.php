<div class="flex flex-col gap-5 py-3 mt-2">
  <h1 class="capitalize text-2xl font-semibold pb-2 border-b border-gray-300">{{ $modelName }} -> id:
    {{ $entity->id }}</h1>

  <div class="w-full">
    @foreach ($keys as $key)
      <div class="flex flex-col gap-2 py-2 border-b border-gray-200">
        <h3 class="capitalize text-xl font-semibold">{{ $key }}:</h3>
        <p class="text-base">{{ $entity->$key ?? 'N/A' }}</p>
      </div>
    @endforeach
  </div>

  <a class="button w-min !bg-gray-200 hover:!bg-gray-300" href="{{ URL::previous() }}">
    Return
  </a>
</div>
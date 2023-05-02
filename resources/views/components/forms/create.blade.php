<div class="flex flex-col gap-5 ">
  <h1 class="capitalize text-2xl font-semibold pb-2 border-b border-[#41644A]">{{ $modelName }} -> Create </h1>

  <div class="w-full">
    <form class="flex flex-col gap-4" action="{{ route($modelName . '.store') }}" method="POST">

      @csrf
      @foreach ($keys as $key)
        @if (in_array($columnTypes[$key], ['text', 'number']))
          <label class="capitalize flex flex-col" for={{ $key }}>
            {{ $key }}
            <input class="create-input rounded-md" type="text" name={{ $key }} value="{{ old($key) }}">
            @error($key)
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>
        @elseif (in_array($columnTypes[$key], ['longText']))
          <label class="capitalize flex flex-col" for={{ $key }}>
            {{ $key }}
            <textarea class="create-input rounded-md h-32" name={{ $key }}>{{ old($key) }}</textarea>
            @error($key)
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>
        @elseif(in_array($columnTypes[$key], ['date']))
          <label class="capitalize flex flex-col" for={{ $key }}>
            {{ $key }}
            <input class="create-input rounded-md" type="date" name={{ $key }}
                   value="{{ old($key) }}">
            @error($key)
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>
        @endif
      @endforeach

      <div class="flex gap-4 justify-between">
        <a class="button w-min " href="{{ route($modelName . '.index') }}">
          Return
        </a>

        <button class="add-entry" type="submit">Add entry</button>
      </div>
    </form>
  </div>

</div>

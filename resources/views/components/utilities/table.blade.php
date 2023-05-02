<div class="flex flex-col gap-5 ">

  <x-utilities.with-message message-prop="status" />
  <x-utilities.with-message message-prop="error" />

  <div class="flex justify-between content-center">
    <h1 class="capitalize text-2xl font-semibold">{{ $tableName }}</h1>

    <a class="button !bg-green-200 hover:!bg-green-300" href="{{ route(strtolower($tableName) . '.create') }}">Add
      record</a>
  </div>

  <div class="scroll-container overflow-x-auto rounded-lg shadow md:block">
    @if (count($values) > 0)
      <table class="w-full text-black bg-[#FFF4E0] ">

        <thead class="bg-[#41644A]">
          <tr>
            @foreach ($keys as $key)
              <th class="text-white text-sm font-bold text-left p-2">
                {{ $key }}</th>
            @endforeach

            <th class="text-white text-sm font-bold text-left p-2">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @foreach ($values as $value)
            <tr class="even:bg-[#F3DEBA]">
              @foreach ($keys as $key)
                <td
                    class="border-none border-t border-gray-400 py-2 px-3 align-top max-w-[900px] {{ strlen($value->$key) > 80 ? 'long-field' : '' }}">
                  {{ $value->$key ?? 'NA' }}</td>
              @endforeach

              <td class="border-none border-t border-gray-400 py-2 px-3 align-top">
                <div class="flex content-start gap-3">
                  <a class="button !bg-blue-200 hover:!bg-blue-300"
                     href="{{ route(strtolower($tableName) . '.show', $value) }}">View</a>
                  <a class="button !bg-yellow-200 hover:!bg-yellow-300"
                     href="{{ route(strtolower($tableName) . '.edit', $value->id) }}">Edit</a>

                  <form action="{{ route(strtolower($tableName) . '.destroy', $value->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button !bg-red-300 hover:!bg-red-400">Delete</button>
                  </form>

                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <x-sections.no-entries />
    @endif
  </div>
</div>

<div class="flex flex-col gap-5 py-3">
  <div class="flex justify-between content-center mt-2">
    <h1 class="capitalize text-2xl font-semibold">{{ $tableName }}</h1>

    <button class="button !bg-green-200 hover:!bg-green-300">Add entry</button>
  </div>

  <div class="scroll-container overflow-auto rounded-lg shadow md:block">
    <table class="w-full text-black bg-white">

      <thead class="bg-gray-800">
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
          <tr class="even:bg-gray-200">
            @foreach ($keys as $key)
              <td
                  class="border-none border-t border-gray-400 py-1 px-2 align-top max-w-[500px] {{ strlen($value->$key) > 80 ? 'long-field' : '' }}">
                {{ $value->$key }}</td>
            @endforeach

            <td class="border-none border-t border-gray-400 py-1 px-2 align-top">
              <div class="flex content-start gap-3">
                <a class="button !bg-blue-200 hover:!bg-blue-300" href="#">View</a>
                <a class="button !bg-yellow-200 hover:!bg-yellow-300" href="#">Edit</a>
                <button class="button !bg-red-300 hover:!bg-red-400">Delete</button>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

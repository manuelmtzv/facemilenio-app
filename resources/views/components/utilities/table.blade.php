<table>
  <thead>
    <tr>
      <th>{{ $tableName }}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($keys as $key)
        <th>{{ $key }}</th>
      @endforeach
    </tr>

    @foreach ($values as $value)
      <tr>
        @foreach ($keys as $key)
          <td>{{ $value->$key }}</td>
        @endforeach
      </tr>
    @endforeach
  </tbody>
</table>

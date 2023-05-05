<form class="flex flex-col items-end pt-8" action="{{ route('activities.store'), auth()->user()->id }}" method="POST">

  @csrf
  <fieldset class="flex flex-col w-full gap-2">
    <h3 class="text-xl">Create an activity:</h3>
    <label class="label">
      Title
      <input class="input !border-[#41644A]" name="title" type="text" value="{{ old('title') }}">
      @error('title')
        <small class="form-error">{{ $message }}</small>
      @enderror
    </label>

    <label class="label">
      Content
      <textarea class="input !border-[#41644A]" name="content">{{ old('content') }}</textarea>
      @error('content')
        <small class="form-error">{{ $message }}</small>
      @enderror
    </label>

    <label class="label !hidden">
      User id
      <input class="input !border-[#41644A]" name="user_id" type="text" value="{{ auth()->user()->id }}">
    </label>

  </fieldset>

  <button class="add-entry border border-[#41644A] mt-4" type="submit">Create activity</button>

</form>

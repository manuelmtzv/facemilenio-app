<form class="flex flex-col items-end pt-4" action="{{ route('comments.store'), auth()->user()->id }}" method="POST">

  @csrf
  <fieldset class="flex flex-col w-full gap-2">
    <label class="label">
      <span class="font-bold">Add comment</span>
      <textarea class="input !border-[#41644A]" name="content"
                placeholder="Nullam felis libero, condimentum nec nibh a, vestibulum convallis erat...">{{ old('content') }}</textarea>
      @error('content')
        <small class="form-error">{{ $message }}</small>
      @enderror
    </label>

    <label class="label !hidden">
      User id
      <input class="input !border-[#41644A]" name="user_id" type="text" value="{{ auth()->user()->id }}">
    </label>

    <label class="label !hidden">
      Activity id
      <input class="input !border-[#41644A]" name="activity_id" type="text" value="{{ $activityId }}">
    </label>

  </fieldset>

  <button class="add-entry border border-[#41644A] mt-4" type="submit">Create comment</button>

</form>

<x-layouts.app title="Register" meta-description="Landing meta description">
  <div class="form-container">
    <form class="form" action="{{ route('register.post') }}" method="POST">

      @csrf
      <h2 class="form-title">Register</h2>

      <section class="w-[95%] mx-auto">
        <div class="form-section flex !flex-row !gap-5">
          <label class="label" for="name">
            Name
            <input class="input" id="name" name="name" type="name" value="{{ old('name') }}" autofocus>
            @error('name')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="label" for="surname">
            Surname
            <input class="input" id="surname" name="surname" type="surname" value="{{ old('surname') }}">
            @error('surname')
              <small>{{ $message }}</small>
            @enderror
          </label>
        </div>

        <div class="form-section">
          <label class="label" for="email">
            Email
            <input class="input" id="email" name="email" type="email" value="{{ old('email') }}">
            @error('email')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="label" for="password">
            Password
            <input class="input" id="password" name="password" type="password" value="">
            @error('password')
              <small>{{ $message }}</small>
            @enderror
          </label>
        </div>

        <div class="form-section">
          <label class="label" for="gender">
            Gender
            <select class="input select" id="gender" name="gender" value="{{ old('gender') }}">
              <option value="" selected>- select -</option>
              @foreach ($genders as $gender)
                <option value="{{ $gender->name }}">{{ $gender->name }}</option>
              @endforeach
            </select>
            @error('gender')
              <small>{{ $message }}</small>
            @enderror
          </label>
        </div>
      </section>

      <button class="submit" type="submit">Register</button>
    </form>
  </div>
</x-layouts.app>

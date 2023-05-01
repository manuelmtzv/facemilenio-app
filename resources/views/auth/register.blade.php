<x-layouts.app title="Register" meta-description="Landing meta description">
  <div class="form-container">
    <form class="form" action="{{ route('register.post') }}" method="POST">

      @csrf
      <h2 class="form-title">Register</h2>

      <section class="entry-container">
        <div class="form-section flex !flex-row !gap-5">
          <label class="label" for="name">
            Name
            <input class="input" id="name" name="name" type="name" value="{{ old('name') }}" autofocus>
            @error('name')
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>

          <label class="label" for="surname">
            Surname
            <input class="input" id="surname" name="surname" type="surname" value="{{ old('surname') }}">
            @error('surname')
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>
        </div>

        <div class="form-section">
          <label class="label" for="username">
            Username
            <input class="input" id="username" name="username" type="username" value="{{ old('username') }}">
            @error('username')
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>

          <label class="label" for="email">
            Email
            <input class="input" id="email" name="email" type="email" value="{{ old('email') }}">
            @error('email')
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>

          <label class="label" for="password">
            Password
            <input class="input" id="password" name="password" type="password" value="">
            @error('password')
              <small class="form-error">{{ $message }}</small>
            @enderror
          </label>
        </div>

        <div class="form-section flex !flex-row !gap-5">
          <div class="form-section">
            <label class="label" for="gender">
              Gender
              <select class="input select !bg-[#fff4e0]" id="gender" name="gender" value="{{ old('gender') }}">
                <option value="" selected>- select -</option>
                @foreach ($genders as $gender)
                  <option value="{{ $gender->name }}">{{ $gender->name }}</option>
                @endforeach
              </select>
              @error('gender')
                <small class="form-error">{{ $message }}</small>
              @enderror
            </label>
          </div>

          <div class="form-section">
            <label class="label" for="birthdate">
              Birthdate
              <input class="input" id="birthdate" name="birthdate" type="date" value="">
              @error('birthdate')
                <small class="form-error">{{ $message }}</small>
              @enderror
            </label>
          </div>
        </div>

        <button class="submit" type="submit">Register</button>
      </section>


    </form>
  </div>
</x-layouts.app>

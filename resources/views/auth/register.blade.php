<x-layouts.app title="Register" meta-description="Landing meta description">
  <div class="register container">
    <form class="register__form" action="{{ route('register.post') }}" method="POST">

      @csrf
      <h2 class="register__title">Register</h2>

      <div class="register__container">
        <div class="register__section">
          <label class="register__input register__input--name" for="name">
            Name
            <input id="name" name="name" type="name" value="{{ old('name') }}" autofocus>
            @error('name')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--surname" for="surname">
            Surname
            <input id="surname" name="surname" type="surname" value="{{ old('surname') }}">
            @error('surname')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--email" for="email">
            Email
            <input id="email" name="email" type="email" value="{{ old('email') }}">
            @error('email')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--password" for="password">
            Password
            <input id="password" name="password" type="password" value="">
            @error('password')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--country" for="country">
            Country
            <select id="country" name="country" value="{{ old('country') }}">
              <option value="" selected>- select -</option>
              @foreach ($countries as $country)
                <option value="{{ $country->name }}">{{ $country->name }}</option>
              @endforeach
            </select>
            @error('country')
              <small>{{ $message }}</small>
            @enderror
          </label>
        </div>

        <div class="register__section">
          <label class="register__input register__input--gender" for="gender">
            Gender
            <select id="gender" name="gender" value="{{ old('gender') }}">
              <option value="" selected>- select -</option>
              @foreach ($genders as $gender)
                <option value="{{ $gender->name }}">{{ $gender->name }}</option>
              @endforeach
            </select>
            @error('gender')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--birthdate" for="birthdate">
            Birthdate
            <input id="birthdate" name="birthdate" type="date" value="{{ old('birthdate') }}">
            @error('birthdate')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--description" for="description">
            Biography
            <Textarea name="biography" value="{{ old('description') }}"></Textarea>
            @error('biography')
              <small>{{ $message }}</small>
            @enderror
          </label>

          <label class="register__input register__input--city" for="city">
            City
            <select id="city" name="city" value="{{ old('city') }}">
              <option value="" selected>- select -</option>
              @foreach ($cities as $city)
                <option value="{{ $city->name }}">{{ $city->name }}</option>
              @endforeach
            </select>
            @error('city')
              <small>{{ $message }}</small>
            @enderror
          </label>
        </div>
      </div>

      <button class="register__submit" type="submit">Register</button>
    </form>
  </div>
</x-layouts.app>

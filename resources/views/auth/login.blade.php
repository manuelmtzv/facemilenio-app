<x-layouts.app title="Login" meta-description="Login meta description">
  <div class="form-container">
    <form class="form" action="{{ route('login') }}" method="POST">
      @csrf
      <h2 class="form-title">Login</h2>

      <div class="entry-container">
        <label class="label" for="email">
          Email
          <input class="input" id="email" name="email" type="email" value="{{ old('email') }}">
          @error('email')
            <small class="form-error">{{ $message }}</small>
          @enderror
        </label>

        <label class="label" for="password">
          Password
          <input class="input" id="password" name="password" type="password">
          @error('password')
            <small class="form-error">{{ $message }}</small>
          @enderror
        </label>

        <label class="remember" for="remember">
          <input id="remember" type="checkbox" name="remember">
          <span>Remember me</span>
        </label>

        <button class="submit" type="submit">Login</button>
      </div>
    </form>
  </div>
</x-layouts.app>

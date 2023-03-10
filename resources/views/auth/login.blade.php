<x-layouts.app title="Login" meta-description="Login meta description">
  <div class="login container">
    <form class="login__form" action="#">
      <h2 class="login__title">Login</h2>

      <div class="login__container">
        <label class="login__input login__input--email" for="email">
          Email
          <input id="email" name="email" type="email">
        </label>

        <label class="login__input login__input--password" for="password">
          Password
          <input id="password" name="password" type="password">
        </label>

        <button class="login__submit" type="submit">Login</button>
      </div>
    </form>
  </div>
</x-layouts.app>

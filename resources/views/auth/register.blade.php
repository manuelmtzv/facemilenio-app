<x-layouts.app>
  <div class="register container">
    <form class="register__form" action="#">
      <h2 class="register__title">Register</h2>

      <div class="register__container">
        <div class="register__section">
          <label class="register__input register__input--name" for="name">
            Name
            <input id="name" name="name" type="name">
          </label>

          <label class="register__input register__input--surname" for="surname">
            Surname
            <input id="surname" name="surname" type="surname">
          </label>

          <label class="register__input register__input--email" for="email">
            Email
            <input id="email" name="email" type="email">
          </label>

          <label class="register__input register__input--password" for="password">
            Password
            <input id="password" name="password" type="password">
          </label>

          <label class="register__input register__input--country" for="country">
            Country
            <select id="country" name="country"></select>
          </label>
        </div>

        <div class="register__section">
          <label class="register__input register__input--gender" for="gender">
            Gender
            <input id="gender" name="gender" type="gender">
          </label>

          <label class="register__input register__input--birthdate" for="birthdate">
            Birthdate
            <input id="birthdate" name="birthdate" type="date">
          </label>

          <label class="register__input register__input--description" for="description">
            Birthdate
            <Textarea></Textarea>
          </label>

          <label class="register__input register__input--city" for="city">
            City
            <select id="city" name="city"></select>
          </label>
        </div>
      </div>

      <button class="register__submit" type="submit">Register</button>
    </form>
  </div>
</x-layouts.app>

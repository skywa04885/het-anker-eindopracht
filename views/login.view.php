<div class="wrapper__login_personal">
  <div class="form-error" id="loginPersonalFormError" style="display: none;">
    <p class="form-error__title" id="loginPersonalFormErrorTitle"></p>
    <p class="form-error__description" id="loginPersonalFormErrorDesc"></p>
  </div>
  <form class="form" id="loginPersonalForm">
    <fieldset class="form__fieldset">
      <legend>Inloggen als personeel</legend>
      <p>Log in om uzelf in te schijven voor activiteiten.</p>
      <!-- Naam -->
      <div class="form-input">
        <input type="text" id="numberInput" required />
        <label for="numberInput">Personeels nummer<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="nameInputError"></p>
      <!-- Email -->
      <div class="form-input">
        <input type="text" id="voucherInput" required />
        <label for="voucherInput">Voucher<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="voucherCodeError"></p>
      <hr />
      <button class="btn btn-secondary" type="submit">Log in</button>
    </fieldset>
  </form>
</div>
<div class="wrapper__login_admin">
  <div class="form-error" id="loginAdminFormError" style="display: none;">
    <p class="form-error__title" id="loginAdminFormErrorTitle"></p>
    <p class="form-error__description" id="loginAdminFormErrorDesc"></p>
  </div>
  <form class="form" id="loginAdminForm">
    <fieldset class="form__fieldset">
      <legend>Inloggen als administrator</legend>
      <p>Log in om de activiteiten en personeel te managen.</p>
      <!-- Naam -->
      <div class="form-input">
        <input type="text" id="usernameInput" required />
        <label for="usernameInput">Gebruikersnaam<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="nameInputError"></p>
      <!-- Email -->
      <div class="form-input">
        <input type="password" id="passwordInput" required />
        <label for="passwordInput">Wachtwoord<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="voucherCodeError"></p>
      <hr />
      <button class="btn btn-secondary" type="submit">Log in</button>
    </fieldset>
  </form>
</div>
<script src="/public/dist/js/register.js" defer></script>
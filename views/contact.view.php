<div class="wrapper__contact">
  <div class="form-error" id="formError" style="display: none;">
    <p class="form-error__title" id="formErrorTitle"></p>
    <p class="form-error__description" id="formErrorDesc"></p>
  </div>
  <form class="form" id="contactForm">
    <fieldset class="form__fieldset">
      <legend>Contact</legend>
      <p>Velden met <span>*</span> zijn verplicht.</p>
      <!-- Naam -->
      <div class="form-input">
        <input type="text" id="fullNameInput" required />
        <label for="fullNameInput">Naam<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="nameInputError"></p>
      <!-- Email -->
      <div class="form-input">
        <input type="text" id="emailInput" required />
        <label for="emailInput">Email<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="emailInputError"></p>
      <!-- Subject -->
      <div class="form-input">
        <input type="text" id="subjectInput" required />
        <label for="subjectInput">Subject<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="subjectInputError"></p>
      <hr />
      <div class="form-input">
        <textarea id="messageInput" cols="30" rows="10" required></textarea>
        <label for="messageInput">Bericht<span>*</span>: </label>
      </div>
      <p class="form-input__error" id="messageInputError"></p>
      <hr />
      <button class="btn btn-secondary" type="submit">Verstuur</button>
    </fieldset>
  </form>
</div>
<script src="/public/dist/js/contact.js" defer></script>
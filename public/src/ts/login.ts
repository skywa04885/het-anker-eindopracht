const voucherCodeRegex = /^[a-zA-Z]{1}[0-9]{3}$/;
const personalNumberRegex = /^[0-9]{0,10}$/;

// ==== Gets all the ellements ====

// Gets the inputs
const numberInput: HTMLInputElement = <HTMLInputElement>document.getElementById('numberInput');
const personalNumberInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('PersonalNumberInputError');
const voucherInput: HTMLInputElement = <HTMLInputElement>document.getElementById('voucherInput');
const voucherCodeError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('voucherCodeError');
const usernameInput: HTMLInputElement = <HTMLInputElement>document.getElementById('usernameInput');
const usernameInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('usernameInputError');
const passwordInput: HTMLInputElement = <HTMLInputElement>document.getElementById('passwordInput');
const wachtwoordInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('wachtwoordInputError');

// Gets the forms
const loginPersonalForm: HTMLFormElement = <HTMLFormElement>document.getElementById('loginPersonalForm');
const loginAdminForm: HTMLFormElement = <HTMLFormElement>document.getElementById('loginAdminForm');

// Gets the errors
const loginPersonalFormError: HTMLDivElement = <HTMLDivElement>document.getElementById('loginPersonalFormError');
const loginPersonalFormErrorTitle: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('loginPersonalFormErrorTitle');
const loginPersonalFormErrorDesc: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('loginPersonalFormErrorDesc');
const loginAdminFormError: HTMLDivElement = <HTMLDivElement>document.getElementById('loginAdminFormError');
const loginAdminFormErrorTitle: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('loginAdminFormErrorTitle');
const loginAdminFormErrorDesc: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('loginAdminFormErrorDesc');

// ==== Adds the listener ====

// The submit listener for the personal
loginPersonalForm.addEventListener('submit', (e: Event) => {
  let valid: boolean = true;

  // Prevents the default event listener
  e.preventDefault();

  // Checks if the values are correct
  if (!voucherCodeRegex.test(voucherInput.value))
  {
    // Adds the error
    voucherCodeError.innerText = 'Vul een geldige voucher code in.';
    // Sets valid to false
    valid = false;
  } else voucherCodeError.innerText = '';

  if (!personalNumberRegex.test(numberInput.value))
  {
    // Adds the error
    personalNumberInputError.innerText = 'Vul een geldig personeels nummer in.';
    // Sets valid to false
    valid = false;
  }

  // Checks if we need to proceed
  if (valid)
  {
    // Enables the loader
    loader.style.display = 'block';

    // Sets timeout
    setTimeout(() => {
      let request: XMLHttpRequest;

      // ==== Creates the request ====
  
      // Creates the requests
      request = new XMLHttpRequest();
      // OPens the request
      request.open('POST', '/rest/login-personal-submit');
      // Configures the request
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      // Writes the request data
      request.send(`voucher=${voucherInput.value}&number=${numberInput.value}`);
      // Adds the response listener
      request.onreadystatechange = () => {
        // Checks if request ready
        if (request.readyState === 4)
        { // -> Request data received
  
          // Checks the status
          if (request.status !== 200)
          { // -> Invalid status
            
            // Prints to the console
            console.log('Server error occured !');
            // Disables the loader
            loader.style.display = 'none';
            // Returns
            return;
          }
  
          // Parses the body
          const response: any = JSON.parse(request.responseText);
          // Checks status
          if (response['status'] === false)
          {
            // Enables the error
            loginPersonalFormError.style.display = 'block';
            // Sets the error
            loginPersonalFormErrorTitle.innerText = 'Server error !';
            loginPersonalFormErrorDesc.innerHTML = (<string>response['message']).replace(/\n/g, '<br />');
          } else window.location.href = '/';

          // Disables the loader
          loader.style.display = 'none';
        }
      };
    }, 1200);
  }
});
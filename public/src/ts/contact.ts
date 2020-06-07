const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

// ==== Gets the elements ====

// Gets the form stuff and loader
const formError: HTMLDivElement = <HTMLDivElement>document.getElementById('formError');
const formErrorTitle: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('formErrorTitle');
const formErrorDesc: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('formErrorDesc');
const loader: HTMLDivElement = <HTMLDivElement>document.getElementById('loader');

// Gets the inputs
const fullNameInput: HTMLInputElement = <HTMLInputElement>document.getElementById('fullNameInput');
const emailInput: HTMLInputElement = <HTMLInputElement>document.getElementById('emailInput');
const subjectInput: HTMLInputElement = <HTMLInputElement>document.getElementById('subjectInput');
const messageInput: HTMLInputElement = <HTMLInputElement>document.getElementById('messageInput');
// Gets the other stuff
const messageInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('messageInputError');
const subjectInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('subjectInputError');
const emailInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('emailInputError');
const nameInputError: HTMLParagraphElement = <HTMLParagraphElement>document.getElementById('nameInputError');
const contactForm: HTMLFormElement = <HTMLFormElement>document.getElementById('contactForm');

// Adds the listener
contactForm?.addEventListener('submit', (e: Event) => {
  let valid: boolean = true;

  // Prevents the default event
  e.preventDefault();
  
  // ==== Checks the values ====

  // Checks if the fullname is filled
  if (fullNameInput.value.length <= 0)
  { // -> Value empty

    // Updates the error message
    nameInputError.innerText = 'Vul een geldige naam in !';
    // Sets valid to false
    valid = false;
  } else nameInputError.innerText = '';

  // Checks if the email is valid
  if (emailInput.value.length <= 0 || !emailRegex.test(emailInput.value))
  { // -> Value empty

    // Updates the error message
    emailInputError.innerText = 'Vul een geldig email address in !';
    // Sets valid to false
    valid = false;
  } else emailInputError.innerText = '';

  // Checks if the subject is filled
  if (subjectInput.value.length <= 0)
  { // -> Value empty

    // Updates the error message
    subjectInputError.innerText = 'Vul een geldig onderwerp in !';
    // Sets valid to false
    valid = false;
  } else subjectInputError.innerText = '';

  // Checks if the message is filled
  if (messageInput.value.length <= 0)
  { // -> Value empty

    // Updates the error message
    messageInputError.innerText = 'Vul een geldig bericht in !';
    // Sets valid to false
    valid = false;
  } else messageInputError.innerText = '';

  // ==== Checks if we should proceed ====

  if (valid)
  { // -> Data is valid

    // Enables the loader
    loader.style.display = 'block';

    // Sets timeout
    setTimeout(() => {
      let request: XMLHttpRequest;

      // ==== Creates the request ====
  
      // Creates the requests
      request = new XMLHttpRequest();
      // OPens the request
      request.open('POST', '/rest/contact-submit');
      // Configures the request
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      // Writes the request data
      request.send(`name=${encodeURIComponent(fullNameInput.value)}&email=${encodeURIComponent(emailInput.value)}&subject=${encodeURIComponent(subjectInput.value)}&message=${encodeURIComponent(messageInput.value)}`);
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
          // Enables the error
          formError.style.display = 'block';
          // Checks status
          if (response['status'] === false)
          {
            // Sets the error
            formErrorTitle.innerText = 'Server error !';
            formErrorDesc.innerHTML = (<string>response['message']).replace(/\n/g, '<br />');
          } else {
            // Sets the error
            formErrorTitle.innerText = 'Bericht verstuurd !';
            formErrorDesc.innerHTML = 'Wij zullen Z.S.M. reageren !';
          }

          // Disables the loader
          loader.style.display = 'none';
        }
      };
    }, 1200);
  }
});
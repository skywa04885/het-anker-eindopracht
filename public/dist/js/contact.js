"use strict";
var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
// ==== Gets the elements ====
// Gets the form stuff and loader
var formError = document.getElementById('formError');
var formErrorTitle = document.getElementById('formErrorTitle');
var formErrorDesc = document.getElementById('formErrorDesc');
var loader = document.getElementById('loader');
// Gets the inputs
var fullNameInput = document.getElementById('fullNameInput');
var emailInput = document.getElementById('emailInput');
var subjectInput = document.getElementById('subjectInput');
var messageInput = document.getElementById('messageInput');
// Gets the other stuff
var messageInputError = document.getElementById('messageInputError');
var subjectInputError = document.getElementById('subjectInputError');
var emailInputError = document.getElementById('emailInputError');
var nameInputError = document.getElementById('nameInputError');
var contactForm = document.getElementById('contactForm');
// Adds the listener
contactForm === null || contactForm === void 0 ? void 0 : contactForm.addEventListener('submit', function (e) {
    var valid = true;
    // Prevents the default event
    e.preventDefault();
    // ==== Checks the values ====
    // Checks if the fullname is filled
    if (fullNameInput.value.length <= 0) { // -> Value empty
        // Updates the error message
        nameInputError.innerText = 'Vul een geldige naam in !';
        // Sets valid to false
        valid = false;
    }
    else
        nameInputError.innerText = '';
    // Checks if the email is valid
    if (emailInput.value.length <= 0 || !emailRegex.test(emailInput.value)) { // -> Value empty
        // Updates the error message
        emailInputError.innerText = 'Vul een geldig email address in !';
        // Sets valid to false
        valid = false;
    }
    else
        emailInputError.innerText = '';
    // Checks if the subject is filled
    if (subjectInput.value.length <= 0) { // -> Value empty
        // Updates the error message
        subjectInputError.innerText = 'Vul een geldig onderwerp in !';
        // Sets valid to false
        valid = false;
    }
    else
        subjectInputError.innerText = '';
    // Checks if the message is filled
    if (messageInput.value.length <= 0) { // -> Value empty
        // Updates the error message
        messageInputError.innerText = 'Vul een geldig bericht in !';
        // Sets valid to false
        valid = false;
    }
    else
        messageInputError.innerText = '';
    // ==== Checks if we should proceed ====
    if (valid) { // -> Data is valid
        // Enables the loader
        loader.style.display = 'block';
        // Sets timeout
        setTimeout(function () {
            var request;
            // ==== Creates the request ====
            // Creates the requests
            request = new XMLHttpRequest();
            // OPens the request
            request.open('POST', '/rest/contact-submit');
            // Configures the request
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // Writes the request data
            request.send("name=" + encodeURIComponent(fullNameInput.value) + "&email=" + encodeURIComponent(emailInput.value) + "&subject=" + encodeURIComponent(subjectInput.value) + "&message=" + encodeURIComponent(messageInput.value));
            // Adds the response listener
            request.onreadystatechange = function () {
                // Checks if request ready
                if (request.readyState === 4) { // -> Request data received
                    // Checks the status
                    if (request.status !== 200) { // -> Invalid status
                        // Prints to the console
                        console.log('Server error occured !');
                        // Disables the loader
                        loader.style.display = 'none';
                        // Returns
                        return;
                    }
                    // Parses the body
                    var response = JSON.parse(request.responseText);
                    // Enables the error
                    formError.style.display = 'block';
                    // Checks status
                    if (response['status'] === false) {
                        // Sets the error
                        formErrorTitle.innerText = 'Server error !';
                        formErrorDesc.innerHTML = response['message'].replace(/\n/g, '<br />');
                    }
                    else {
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

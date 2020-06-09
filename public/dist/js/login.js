"use strict";
var voucherCodeRegex = /^[a-zA-Z]{1}[0-9]{3}$/;
var personalNumberRegex = /^[0-9]{0,10}$/;
// ==== Gets all the ellements ====
// Gets the inputs
var numberInput = document.getElementById('numberInput');
var personalNumberInputError = document.getElementById('PersonalNumberInputError');
var voucherInput = document.getElementById('voucherInput');
var voucherCodeError = document.getElementById('voucherCodeError');
var usernameInput = document.getElementById('usernameInput');
var usernameInputError = document.getElementById('usernameInputError');
var passwordInput = document.getElementById('passwordInput');
var wachtwoordInputError = document.getElementById('wachtwoordInputError');
// Gets the forms
var loginPersonalForm = document.getElementById('loginPersonalForm');
var loginAdminForm = document.getElementById('loginAdminForm');
// Gets the errors
var loginPersonalFormError = document.getElementById('loginPersonalFormError');
var loginPersonalFormErrorTitle = document.getElementById('loginPersonalFormErrorTitle');
var loginPersonalFormErrorDesc = document.getElementById('loginPersonalFormErrorDesc');
var loginAdminFormError = document.getElementById('loginAdminFormError');
var loginAdminFormErrorTitle = document.getElementById('loginAdminFormErrorTitle');
var loginAdminFormErrorDesc = document.getElementById('loginAdminFormErrorDesc');
// ==== Adds the listener ====
// The submit listener for the personal
loginPersonalForm.addEventListener('submit', function (e) {
    var valid = true;
    // Prevents the default event listener
    e.preventDefault();
    // Checks if the values are correct
    if (!voucherCodeRegex.test(voucherInput.value)) {
        // Adds the error
        voucherCodeError.innerText = 'Vul een geldige voucher code in.';
        // Sets valid to false
        valid = false;
    }
    else
        voucherCodeError.innerText = '';
    if (!personalNumberRegex.test(numberInput.value)) {
        // Adds the error
        personalNumberInputError.innerText = 'Vul een geldig personeels nummer in.';
        // Sets valid to false
        valid = false;
    }
    // Checks if we need to proceed
    if (valid) {
        // Enables the loader
        loader.style.display = 'block';
        // Sets timeout
        setTimeout(function () {
            var request;
            // ==== Creates the request ====
            // Creates the requests
            request = new XMLHttpRequest();
            // OPens the request
            request.open('POST', '/rest/login-personal-submit');
            // Configures the request
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // Writes the request data
            request.send("voucher=" + voucherInput.value + "&number=" + numberInput.value);
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
                    // Checks status
                    if (response['status'] === false) {
                        // Enables the error
                        loginPersonalFormError.style.display = 'block';
                        // Sets the error
                        loginPersonalFormErrorTitle.innerText = 'Server error !';
                        loginPersonalFormErrorDesc.innerHTML = response['message'].replace(/\n/g, '<br />');
                    }
                    else
                        window.location.href = '/';
                    // Disables the loader
                    loader.style.display = 'none';
                }
            };
        }, 1200);
    }
});

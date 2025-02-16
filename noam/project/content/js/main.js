/* Forms checks */

var mailValid = false;
var passwordValid = false;
var rePasswordValid = true;
var nameValid = false;

function checkMailAddr(mailaddr) {
    const mailElement = document.querySelector('input[type="email"]');
    const emailWarning = document.getElementById('email-warning');
    const submitButton = document.querySelector('input[type="submit"]');
    const emailWarningContents = "<blockquote><p><b>Email requirements:</b></p> <ol> <li>User part must not be empty.</li> <li>Valid domain.</li> <li>One <b>@</b> symbol.</li> </ol></blockquote>";

    // Regex for valid email: User part (non-empty) + "@" + valid domain with at least one dot
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Check for Elements on DOM
    if (mailElement && emailWarning && submitButton) {
        if (emailRegex.test(mailaddr)) {  // Check if email matches the regex
            mailElement.style.border = '5px solid green';
            emailWarning.innerHTML = '';
            mailValid = true;

            // Allow submit
            if (mailValid && passwordValid && rePasswordValid) {
                submitButton.disabled = false;
            } else if (!document.getElementById('password') && mailValid && nameValid) {
                submitButton.disabled = false;
            }
        } else {
            mailElement.style.border = '5px solid red';
            emailWarning.innerHTML = emailWarningContents;
            mailValid = false;
            submitButton.disabled = true;
        }
    } else {
        console.warn("Could not find mailElement, submitButton or emailWarning.");
    }
}

function checkPassword(password) {
    // Test matching rePassword if user came back to the password filed.
    const rePassword = document.getElementById('repassword');
    if (rePassword) {
        checkRePassword(rePassword.value);
    }

    const passwordElement = document.getElementById('password');
    const passwordWarning = document.getElementById('password-warning');
    const passwordWarningContents = "<blockquote> <p><b>Password requirements:</b></p><ol><li>At least 8 characters long.</li> <li>One uppercase letter.</li> <li>One lowercase letter.</li> <li>One number.</li> <li>One special character.</li> </ol></blockquote>";
    const submitButton = document.querySelector('input[type="submit"]');

    // Regex for password validation
    // At least 8 characters, one uppercase, one lowercase, one digit, one special character
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

    // Check for Elements on DOM
    if (passwordElement && passwordWarning && submitButton) {
        if (passwordRegex.test(password)) {  // Check if password matches the regex
            passwordElement.style.border = '5px solid green';
            passwordWarning.innerHTML = '';
            passwordValid = true;

            // Allow submit
            if (mailValid && passwordValid && rePasswordValid) {
                submitButton.disabled = false;
            }
        } else {
            passwordElement.style.border = '5px solid red';
            passwordWarning.innerHTML = passwordWarningContents;
            passwordValid = false;
            submitButton.disabled = true;
        }
    } else {
        console.warn("Could not find passwordElement, submitButton or passwordWarning.");
    }
}

function checkRePassword(repassword) {
    const rePasswordElement = document.getElementById('repassword');
    const password = document.getElementById('password');
    const rePasswordWarning = document.getElementById('repassword-warning');
    const rePasswordWarningContents = "<blockquote><p><b>Passwords do not match.</b></p></blockquote>";
    const submitButton = document.querySelector('input[type="submit"]');

    // Check for Elements on DOM
    if (rePasswordElement && password && rePasswordWarning && submitButton) {
        if (repassword === password.value) {
            rePasswordElement.style.border = '5px solid green';
            rePasswordWarning.innerHTML = '';
            rePasswordValid = true;

            // Allow submit
            if (mailValid && passwordValid && rePasswordValid) {
                submitButton.disabled = false;
            }

        } else {
            rePasswordElement.style.border = '5px solid red';
            rePasswordWarning.innerHTML = rePasswordWarningContents;
            rePasswordValid = false;
            submitButton.disabled = true;
        }

    } else {
        console.warn("Could not find rePasswordElement, password, submitButton or rePasswordWarning.");
    }
}

function checkName(name) {
    const nameElement = document.getElementById('fname');
    const nameWarning = document.getElementById('name-warning');
    const nameWarningContents = "<blockquote> <p><b>Names can only include alphabetical characters and spaces.</b></p> </blockquote>";
    const submitButton = document.querySelector('input[type="submit"]');

    // Regex for name validation: Only alphabetic characters and spaces
    const nameRegex = /^[A-Za-z\s]+$/;

    // Check for Elements on DOM
    if (nameElement && nameWarning && nameWarningContents) {
        if (nameRegex.test(name)) {  // Check if name matches the regex
            nameElement.style.border = '5px solid green';
            nameWarning.innerHTML = '';
            nameValid = true;

            // Allow submit
            if (mailValid && nameValid) {
                submitButton.disabled = false;
            }
        } else {
            nameElement.style.border = '5px solid red';
            nameWarning.innerHTML = nameWarningContents;
            nameValid = false;
            submitButton.disabled = true;
        }
    } else {
        console.warn("Could not find nameElement, submitButton or nameWarning.");
    }
}

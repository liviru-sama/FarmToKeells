
//name error
document.addEventListener('DOMContentLoaded', function () {
    var nameInput = document.getElementById('name');
    var nameError = document.getElementById('name-error');

    if (nameInput) {
        nameInput.addEventListener('focus', function () {
            if (nameError) {
                nameError.style.display = 'none';
            }
        });
    }
});

//username error
document.addEventListener('DOMContentLoaded', function () {
    var usernameInput = document.getElementById('username');
    var usernameError = document.getElementById('username-error');

    if (usernameInput) {
        usernameInput.addEventListener('focus', function () {
            if (usernameError) {
                usernameError.style.display = 'none';
            }
        });
    }
});

//email error
document.addEventListener('DOMContentLoaded', function () {
    var emailInput = document.getElementById('email');
    var emailError = document.getElementById('email-error');

    if (emailInput) {
        emailInput.addEventListener('focus', function () {
            if (emailError) {
                emailError.style.display = 'none';
            }
        });
    }
});

//nic error
document.addEventListener('DOMContentLoaded', function () {
    var nicInput = document.getElementById('nic');
    var nicError = document.getElementById('nic-error');

    if (nicInput) {
        nicInput.addEventListener('focus', function () {
            if (nicError) {
                nicError.style.display = 'none';
            }
        });
    }
});

//mobile error
document.addEventListener('DOMContentLoaded', function () {
    var mobileInput = document.getElementById('mobile');
    var mobileError = document.getElementById('mobile-error');

    if (mobileInput) {
        mobileInput.addEventListener('focus', function () {
            if (mobileError) {
                mobileError.style.display = 'none';
            }
        });
    }
});

//password error
document.addEventListener('DOMContentLoaded', function () {
    var passwordInput = document.getElementById('password');
    var passwordError = document.getElementById('password-error');

    if (passwordInput) {
        passwordInput.addEventListener('focus', function () {
            if (passwordError) {
                passwordError.style.display = 'none';
            }
        });
    }
});

//confirm password error
document.addEventListener('DOMContentLoaded', function () {
    var cpasswordInput = document.getElementById('cpassword');
    var cpasswordError = document.getElementById('cpassword-error');

    if (cpasswordInput) {
        cpasswordInput.addEventListener('focus', function () {
            if (cpasswordError) {
                cpasswordError.style.display = 'none';
            }
        });
    }
});

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
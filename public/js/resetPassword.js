function goBack() {
    window.history.back();
}

document.addEventListener('DOMContentLoaded', function () {
var passwordInput = document.getElementById('password');
var passwordError = document.getElementById('password_err');

if (passwordInput) {
    passwordInput.addEventListener('focus', function () {
        if (passwordError) {
            passwordError.style.display = 'none';
        }
    });
}
});
document.addEventListener('DOMContentLoaded', function () {
var cpasswordInput = document.getElementById('confirm_password');
var cpasswordError = document.getElementById('confirm_password_err');

if (cpasswordInput) {
    cpasswordInput.addEventListener('focus', function () {
        if (cpasswordError) {
            cpasswordError.style.display = 'none';
        }
    });
}
});
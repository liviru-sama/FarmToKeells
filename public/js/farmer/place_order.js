document.addEventListener('DOMContentLoaded', function () {
    var formInput = document.getElementById('product_id');
    var formError = document.getElementById('product-error');

    if (formInput) {
        formInput.addEventListener('focus', function () {
            if (formError) {
                formError.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var formInput = document.getElementById('quantity');
    var formError = document.getElementById('quantity-error');

    if (formInput) {
        formInput.addEventListener('focus', function () {
            if (formError) {
                formError.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var formInput = document.getElementById('startdate');
    var formError = document.getElementById('startdate-error');

    if (formInput) {
        formInput.addEventListener('focus', function () {
            if (formError) {
                formError.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var formInput = document.getElementById('enddate');
    var formError = document.getElementById('enddate-error');

    if (formInput) {
        formInput.addEventListener('focus', function () {
            if (formError) {
                formError.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var formInput = document.getElementById('notes');
    var formError = document.getElementById('notes-error');

    if (formInput) {
        formInput.addEventListener('focus', function () {
            if (formError) {
                formError.style.display = 'none';
            }
        });
    }
});
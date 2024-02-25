document.addEventListener('DOMContentLoaded', function () {
    var nameInput = document.getElementById('name');
    var nameError = document.getElementById('newname-error');

    if (nameInput) {
        nameInput.addEventListener('focus', function () {
            if (nameError) {
                nameError.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Get the flash message element
    var flashMessage = document.getElementById('msg-flash');

    // If the flash message element exists
    if (flashMessage) {
        // Add a click event listener to the document
        document.addEventListener('click', function() {
            // Remove the flash message from the DOM
            flashMessage.remove();
        });

        // Add a timeout to automatically remove the flash message after a certain period
        setTimeout(function() {
            flashMessage.remove();
        }, 5000); // Adjust the duration (in milliseconds) as needed
    }
});
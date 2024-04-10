// add_product.js

// This function will reset the form when the "Reset" button is clicked
function resetForm() {
    document.getElementById("myForm").reset();
}

// This function will check for errors and display the error popup if an error exists
function checkForError() {
    var errorPopup = document.getElementById('error-popup');
    if (errorPopup.innerHTML.trim() !== "") {
        errorPopup.style.display = 'block';
    }
}

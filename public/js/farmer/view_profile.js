
function confirmDelete() {
    if (confirm("Are you sure you want to delete your profile?")) {
    // Redirect to the delete-profile.php page to delete the user
    window.location.href = "delete-profile.php";
        }
}

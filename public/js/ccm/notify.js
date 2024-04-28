function updateNotifications() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?php echo URLROOT; ?>/ccm/notify', true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Parse response as JSON
            var response = JSON.parse(xhr.responseText);

            // Get the red circle element
            var redCircle = document.querySelector('.redcircle');

            // Update red circle based on unread notifications
            if (response.unread) {
                redCircle.style.display = 'block'; // Show red circle
            } else {
                redCircle.style.display = 'none'; // Hide red circle
            }
        }
    };

    xhr.send();
}

// Call the function initially
updateNotifications();
setInterval(updateNotifications, 5000);
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .iframe-container {
            position: fixed;
            top: 60px; /* Adjust according to your navbar height */
            right: 0;
            width: 50%; /* Covering right half of the screen */
            height: 100%;
            background-color: white;
            z-index: 999; /* Ensure it's above other content */
            display: none;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        
        /* Add more styles as needed */
    </style>
</head>
<body>
<div id="notificationsFrame" style="display: none;">
    <!-- Notifications content goes here -->
    <!-- You can load content dynamically using AJAX or include static content here -->


        <div class="close-button" onclick="hideNotifications()">Close</div>
        <h2>Notifications</h2>
        <!-- Fetch messages from the database and display them here in a table -->
        <table>
            <thead>
                <tr>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
            <tr>
    <td>
        <div class="notification">
            <div class="notification-title">New Message</div>
            <div class="notification-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget orci eu velit vehicula consequat vel et libero.</div>
            <div class="notification-time">2 hours ago</div>
        </div>
    </td>
</tr>
 <!-- PHP code to fetch messages from the database and loop through them -->
                <?php 
                // Sample PHP code for fetching messages (replace it with actual database queries)
                for ($i = 0; $i < 5; $i++) {
                    echo "<tr><td>Message " . ($i + 1) . "</td></tr>";
                }
                ?>
            </tbody>
        </table></div>
    </div>

    <script>
        function hideNotifications() {
            document.querySelector('.iframe-container').style.display = 'none';
        }

        parentWindow.document.getElementById('notificationsFrame').style.display = 'none';

    </script>
</body>
</html>

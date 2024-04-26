<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
    body,
    html {
        /* Add your background image URL and properties here */
        background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
        background-size: cover;
        height: 100%;
    }

    #notificationFrame,
    #productSelectionFrame {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        z-index: 9999;
        display: none;
        /* Initially hide the iframe */
        width: 80%;
        /* Adjust width as needed */
        height: 80%;
        /* Adjust height as needed */
    }

    .text-field textarea {
        width: 100%;
        padding: 10px;
        border: 9px solid #ccc;
        /* Add a border */
        border-radius: 10px;
        /* Add border radius */
        background-color: transparent;
        /* Set transparent background */
        resize: vertical;
        /* Allow vertical resizing */
        box-sizing: border-box;
        /* Include padding and border in textarea's total width */
    }

    /* Optional: Style the label */
    .text-field label {
        display: block;
        margin-bottom: 5px;
    }

    .chat-message {
        margin-bottom: 10px;
        max-width: 70%;
        padding: 20px;
        border-radius: 30px;
        clear: both;
        overflow: hidden;
        word-wrap: break-word;
        z-index: 9999;
        font-size: 20px;
        box-shadow: 0 .4rem .8rem #0005;
    }

    .admin-message {
        float: left;
        background-color: white;
        color: black;
    }

    .message-time {
        float: left;
        color: black;
        font-size: 10px;
    }

    .user-message {
        float: right;
        background-color: #65A534;
        /* Green color */
        color: white;
        text-align: right;
    }

    .empty-reply {
        background-color: white;
        /* Green color */
    }

    .chat-container {
        padding: 20px;
        position: relative;
        margin-bottom: -10px;
        /* Negative margin equal to desired bottom padding */
    }

    .chat-form-container {
        width: 100%;
    }

    .add-inquiry-form {
        position: fixed;
        top: 10%;
        width: 80%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        z-index: 999;
        border-radius: 10px;
        left: 28%;
    }

    .add-inquiry-form textarea {
        width: 100%;
        /* Adjust width to accommodate padding */
        padding: 10px;
        border: 2px solid black;
        border-radius: 10px;
        background-color: transparent;
        resize: none;
        /* Prevent resizing */
        box-sizing: border-box;
        z-index: 1;
    }

    .add-inquiry-form .send-button {
        width: 100%;
        /* Adjust width to accommodate padding */
        background-color: rgba(181, 174, 174, 0.25);
        color: white;
        border-radius: 10px;
        padding: 10px;
        cursor: pointer;
        box-sizing: border-box;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-icons">
            <div class="navbar-icon-container" data-text="Go Back">
                <a href="#" id="backButton" onclick="goBack()">
                    <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
                </a>
            </div>


            <div class="navbar-icon-container" data-text="Notifications">
                <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton"
                    onclick="toggleNotifications()">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications"
                        class="navbar-icon">
                </a>
            </div>

            <div class="navbar-icon-container" data-text="View Profile">
                <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout"
                        class="navbar-icon">
                </a>
            </div>


            <div class="navbar-icon-container" data-text="Logout">
                <a href="<?php echo URLROOT; ?>/farmer/logout">
                    <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
                </a>
            </div>
        </div>
        <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">

    </div>
    <script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
    </script>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment"
                        style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/inquiry"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Help</h6>
                        </div>
                    </a>


                </div>
            </div>
        </section>
    </div>
    <!-- Main content -->
    <div class="main-content">
        <section class="header">
        </section>
        <section class="table_body">
            <?php 
            // Sort the inquiries array based on created_at timestamp in ascending order
            usort($data['inquiries'], function($a, $b) {
                return strtotime($a->created_at) - strtotime($b->created_at);
            });
            ?>

            <div class="chat-container" id="chatContainer">
                <?php foreach ($data['inquiries'] as $inquiry): ?>
                <!-- User inquiry message -->
                <div class="chat-message user-message">
                    <div class="message-content" style="text-align:left;">
                        You:</br><?php echo $inquiry->inquiry; ?></br></br></div>
                    <div class="message-time"><?php echo $inquiry->created_at; ?></div>
                </div>

                <!-- Admin reply message -->
                <?php if (!empty($inquiry->admin_reply)): ?>
                <div class="chat-message admin-message">
                    <div class="message-content"><?php echo $inquiry->admin_reply; ?></br></br></div>
                    <div class="message-time"><?php echo $inquiry->admin_reply_time; ?></div>
                </div></br></br></br></br></br></br></br></br>
                <?php else: ?>
                <div class="chat-message admin-message empty-reply"></div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="chat-form-container">
                <div class="add-inquiry-form">
                    <form action="<?php echo URLROOT; ?>/farmer/sendInquiry" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="username" value="<?php echo $data['user_data']->username; ?>">
                        <input type="hidden" name="contact_no" value="<?php echo $data['user_data']->mobile; ?>"
                            readonly>
                        <input type="hidden" name="email" value="<?php echo $data['user_data']->email; ?>" readonly>
                        <textarea name="inquiry" rows="1" cols="50" style="font-size:20px;color:black;" required
                            placeholder="Ask us Anything..."></textarea>
                        <input type="submit" value="Send" class="send-button">
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        // Function to scroll the chat container to its bottom
        function scrollChatToBottom() {
            var chatContainer = document.getElementById('chatContainer');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Call the function when the DOM content is fully loaded
        scrollChatToBottom();
    });

    function scrollChatToBottom() {
        var chatContainer = document.getElementById('chatContainer');
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    // Call the function when the page loads
    window.onload = scrollChatToBottom;
    </script>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
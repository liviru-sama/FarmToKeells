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

        #notificationFrame {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff5;
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
            z-index: 9999;
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }
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
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }

        .text-field textarea {
    width: 100%;
    padding: 10px;
    border: 9px solid #ccc; /* Add a border */
    border-radius: 10px; /* Add border radius */
    background-color: transparent; /* Set transparent background */
    resize: vertical; /* Allow vertical resizing */
    box-sizing: border-box; /* Include padding and border in textarea's total width */
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
    z-index:9999;
    font-size:20px;
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
    font-size:10px;
}

.user-message {
    float: right;
    background-color: #65A534; /* Green color */
    color: white;
    text-align: right;
}

.empty-reply {
    background-color: white; /* Green color */
}

.chat-container {
   padding: 20px;
   position: relative;
   margin-bottom: -10px; /* Negative margin equal to desired bottom padding */
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
    left:28%;

}



.add-inquiry-form textarea {
    width: 100%; /* Adjust width to accommodate padding */
    padding: 10px;
    border: 2px solid black;
    border-radius: 10px;
    background-color: transparent;
    resize: none; /* Prevent resizing */
    box-sizing: border-box;
    z-index:1;

}

.add-inquiry-form .send-button {
    width: 100%; /* Adjust width to accommodate padding */
    background-color:rgba(181, 174, 174, 0.25);
    color: white;
    border-radius: 10px;
    padding: 10px;
    cursor: pointer;
    box-sizing: border-box;
    font-weight:bold;

}


    </style>
</head>

<body>
<div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">
        <a href="#" id="backButton" onclick="goBack()">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Contact">
        <a href="<?php echo URLROOT; ?>/users/contact" >
                        <img src="<?php echo URLROOT; ?>/public/images/mail.png" alt="back" class="navbar-icon">
                    </a></div>


                    <div class="navbar-icon-container" data-text="View Profile">
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon">
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">
        <a href="<?php echo URLROOT; ?>/ccm/logout">
            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a></div>

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
                    
                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" >
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2"  > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4"  >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" >
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" >
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Help</h6>
                        </div>
                    </a>

                    
                </div>
            </div>
        </section>
    </div>
    <!-- Main content -->
    <div class="main-content">


    
               
           
</br>


      
        
    
    
<section class="header">  
</section>
<section class="table_body">
            <div class="chat-container" id="chatContainer">
            <?php
// Sort messages based on ID in ascending order
usort($data['ccm_chats'], function ($a, $b) {
    return $a->id - $b->id;
});

// Display sorted messages
foreach ($data['ccm_chats'] as $chat):
    // Skip the message if both admin_reply and ccm_reply are empty
    if (empty($chat->admin_reply) && empty($chat->ccm_reply)) {
        continue;
    }

    // Determine the sender based on whether admin_reply is empty or not
    $sender = !empty($chat->admin_reply) ? 'admin' : 'user';

    // Determine the CSS class based on the sender
    $messageClass = $sender === 'admin' ? 'admin-message' : 'user-message';

    // Determine the message content and time based on the sender
    $messageContent = $sender === 'admin' ? $chat->admin_reply : $chat->ccm_reply;
    $messageTime = $sender === 'admin' ? $chat->admin_reply_time : $chat->created_at;
?>
    <!-- Display the message -->
    <div class="chat-message <?php echo $messageClass; ?>">
        <div class="message-content" style="text-align:<?php echo $sender === 'admin' ? 'left' : 'right'; ?>;">
            <?php echo $messageContent; ?></br></br>
        </div>
        <div class="message-time"><?php echo $messageTime; ?></div>
    </div>
<?php endforeach; ?>


            </div>

            <div class="chat-form-container">
                <div class="add-inquiry-form">
        <form action="<?php echo URLROOT; ?>/ccm/addChat" method="post">
           
                <label for="inquiry"></label>
                <textarea name="inquiry" rows="1" cols="50" required placeholder="Send message to ADMIN..." style="font-size:25px; color:black;"></textarea>
                <input type="submit" value="Send" class="send-button">
            </div>
            
        </form>
    </div>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>


</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
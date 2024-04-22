<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>farmer/view_profile.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        .profile-info {
    display: flex;
    align-items: center; /* Align items vertically */
    margin-bottom: 10px; /* Adjust spacing between profile image/heading and update button */
}

.profile-image {
    flex: 0 0 auto; /* Don't allow the image to grow or shrink */
    margin: 30px; /* Adjust spacing between image and heading */
    padding:30px;
}

.profile-image img {
    width: 200px; /* Adjust the width of the profile image */
    height: 200px; /* Maintain aspect ratio */
    padding:30px;
    position: relative;
    right: 20%;
    left: 20%;
    top: 20%;
    

    
    border-radius: 50%; /* Make the image circular */
}

.profile-heading {
    flex: 1; /* Allow the heading to grow to fill remaining space */
}

.form-button {
    color: white;
    width: 80%;
    height: 45px;
    border: 0 solid #65A534;
    background:#65A534;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    margin: 20px 10px;
}

.chat-message {
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 30px;
            clear: both;
            overflow: hidden;
            word-wrap: break-word;
            z-index: 9999;
            font-size: 22px;
            box-shadow: 0 .4rem .8rem #0005;
        }

        .admin-message {
            background-color:#65A534;
            color: white;
        }

        .message-time {
            float: right;
            color: white;
            font-size: 10px;
        }

        .user-message {
            float: right;
            background-color: #65A534; /* Green color */
            color: white;
            text-align: right;
        }

       

        .chat-container {
            padding: 150px;
            position: relative;
            margin-bottom: -10px; /* Negative margin equal to desired bottom padding */
            background-color:;
        }

        .chat-form-container {
            width: 50%;
        }

.center{
border-radius:50px;
top:58%;}

        
    </style>
</head>

<body>
<div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">
        <a href="<?php echo URLROOT; ?>/farmer/dashboard">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon" style="background: #65A534; transform: scale(1.08);">
        </a></div>


      


                    <div class="navbar-icon-container" data-text="View Profile" >
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon" >
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/farmer/logout">

            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a></div>

    </div>
    <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
   
</div>


    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    
                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" data-text="Your Products">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" data-text="View Their Purchaseorders and Your Salesorders" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" data-text="View Current Market Demands and Prices" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" data-text="View Your Transport requests">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" data-text="View Your Payment Requests">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" data-text="View Your Inquiries">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Help</h6>
                        </div>
                    </a>

                    
                </div>
            </div>
        </section>
    </div>

    <!-- Main content -->
    <div class="main-content" >

   
</br>
   
           

<section class="header"></section>
<section class="header">
        </section>
        <section class="table_body">

        <div class="chat-container" id="chatContainer">
        <?php if (empty($data['notifications'])): ?>
    <p>You don't have any notifications yet.</p>
<?php else: ?>
    <?php foreach ($data['notifications'] as $notification): ?>
        <div class="chat-message admin-message">
        <?php if ($notification->action === 'status_update' && $notification->user_id === $_SESSION['user_id']): ?>
            <div class="message-content" style="text-align:left;"> <p>Keels has updated your Order ID <?php echo $notification->order_id; ?>'s status to '<?php echo $notification->status; ?>' <div class="message-time"> <?php echo $notification->time; ?>.</p> </div></div>
        <?php elseif ($notification->action === 'new purchase order' ): ?>
            <div class="message-content" style="text-align:left;"><p>Keels has added a new purchase order for '<?php echo $notification->product_name; ?>'<div class="message-time"> <?php echo $notification->time; ?>.</p> </div></div>
        <?php elseif ($notification->action === 'price_update'): ?>
            <?php if ($notification->status === 'increased'): ?>
                <div class="message-content" style="text-align:left;"> <p>The price of '<?php echo $notification->product_name; ?>' has increased to <?php echo $notification->price; ?> <div class="message-time"> <?php echo $notification->time; ?>.</p> </div></div>
            <?php elseif ($notification->status === 'decreased'): ?>
                <div class="message-content" style="text-align:left;"><p>The price of '<?php echo $notification->product_name; ?>' has decreased to <?php echo $notification->price; ?> <div class="message-time"> <?php echo $notification->time; ?>.</p> </div></div>
            <?php endif; ?>
        <?php elseif ($notification->action === 'payment_update' && $notification->user_id === $_SESSION['user_id']): ?>
            <div class="message-content" style="text-align:left;"><p>Your Order ID <?php echo $notification->order_id; ?> ' s payment of <?php echo $notification->price; ?> has been settled by Keels <div class="message-time"> <?php echo $notification->time; ?>.</p> </div></div>
        <?php elseif ($notification->action === 'reply' && $notification->user_id === $_SESSION['user_id']): ?>
            <div class="message-content" style="text-align:left;"> <p>Keels has responded to your inquiry '<?php echo $notification->inquiry; ?>' with '<?php echo $notification->admin_reply; ?>' <div class="message-time"><?php echo $notification->time; ?>.</p> </div></div>
        <?php elseif ($notification->action === 'replyupdate' && $notification->user_id === $_SESSION['user_id']): ?>
            <div class="message-content" style="text-align:left;"> <p>Keels has updated their reply to your '<?php echo $notification->inquiry; ?>' with '<?php echo $notification->admin_reply; ?>'<div class="message-time"><?php echo $notification->time; ?>.</p> </div></div>
        <?php endif; ?>
        </div> 
    <?php endforeach; ?>
<?php endif; ?>


</div>



</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

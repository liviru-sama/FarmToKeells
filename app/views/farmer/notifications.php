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
            color: black;
            font-size: 10px;
        }

        .user-message {
            float: right;
            background-color: #65A534; /* Green color */
            color: white;
            text-align: right;
        }

       

        .chat-container {
    padding-left: 80px; /* Horizontal padding */
    padding-right: 80px; /* Horizontal padding */
    padding-top: 0px; /* Minimal vertical padding */
    padding-bottom: 20px; /* Minimal vertical padding */
    position: relative;
}

        



        
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
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon" style="background: #65A534; transform: scale(1.28);">
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
    <div class="main-contents" style=" position: fixed;
            left: 9.0%;
            width: 91%;
            height: 91%;
            bottom: 0;
            z-index: 2;
            overflow: auto;
            border-radius: 20px;" >

   
   
           

<section class="header"></section>
<section class="header">
        </section>
        <section class="table_body">

        <div class="chat-container" id="chatContainer">
        <?php if (empty($data['notifications'])): ?>
    <p>You don't have any notifications yet.</p>
<?php else: ?>
    <table>
    <?php 
    // Sort notifications array by time in descending order
    usort($data['notifications'], function($a, $b) {
        return strtotime($b->time) - strtotime($a->time);
    });
    
    foreach ($data['notifications'] as $notification): ?>
        <p>
                       
            <div style="background-color:#65A534;
                color: white; border-radius: 90px;
                overflow: hidden;
                word-wrap: break-word;
                z-index: 9999;
                font-size: 22px;
                box-shadow: 0 .4rem .8rem #0005;
                text-align:left;">
                <?php switch ($notification->action):
                    case 'status_update':
                        if ($notification->user_id === $_SESSION['user_id']) {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keells has updated your Order ID {$notification->order_id}'s status to '{$notification->status}' </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        }
                        break;
                    case 'new purchase order':
                        echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keells has added a new purchase order for '{$notification->product_name}' </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        break;
                    case 'price_update':
                        if ($notification->status === 'increased') {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The price of '{$notification->product_name}' has increased to {$notification->price} </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        } elseif ($notification->status === 'decreased') {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The price of '{$notification->product_name}' has decreased to {$notification->price} </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        }
                        break;
                    case 'payment_update':
                        if ($notification->user_id === $_SESSION['user_id']) {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Order ID {$notification->order_id}'s payment of {$notification->price} has been settled by Keells</br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        }
                        break;
                    case 'reply':
                        if ($notification->user_id === $_SESSION['user_id']) {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keells has responded to your inquiry '{$notification->inquiry}' with '{$notification->admin_reply}'</br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        }
                        break;
                    case 'replyupdate':
                        if ($notification->user_id === $_SESSION['user_id']) {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keells has updated their reply to your inquiry '{$notification->inquiry}' with '{$notification->admin_reply}' </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        }
                        break;
                endswitch; ?>
            </div> 
           
            </p>
    <?php endforeach; ?>
</table>


<?php endif; ?>

</div>



</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

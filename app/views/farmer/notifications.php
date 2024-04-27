<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>notifications.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/farmer/notifications.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
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
    <main class="main-content" >
    <h1>Notifications</h1>
        <section class="notifications">
            
            <div class="notification-container">
                <?php if (empty($data['notifications'])): ?>
                    <p>You don't have any notifications yet.</p>
                <?php else: ?>
                  
                    <?php foreach ($data['notifications'] as $notification): ?>
                        <?php 
                            switch ($notification->action):
                                case 'status_update':
                                    $mainTopic = "Order Status Update";
                                    $notificationContent = "Keells has updated your Order ID {$notification->order_id}'s status to '{$notification->status}'";
                                    break;
                                case 'new purchase order':
                                    $mainTopic = "New Purchase Order";
                                    $notificationContent = "Keells has added a new purchase order for '{$notification->product_name}'";
                                    break;
                                case 'price_update':
                                    $mainTopic = "Price Update";
                                    $notificationContent = "The price of '{$notification->product_name}' has {$notification->status} to {$notification->price}";
                                    break;
                                case 'payment_update':
                                    $mainTopic = "Payment Update";
                                    $notificationContent = "Your Order ID {$notification->order_id}'s payment of {$notification->price} has been settled by Keells";
                                    break;
                                case 'reply':
                                    $mainTopic = "Inquiry Response";
                                    $notificationContent = "Keells has responded to your inquiry '{$notification->inquiry}' with '{$notification->admin_reply}'";
                                    break;
                                case 'replyupdate':
                                    $mainTopic = "Inquiry Response Update";
                                    $notificationContent = "Keells has updated their reply to your inquiry '{$notification->inquiry}' with '{$notification->admin_reply}'";
                                    break;
                            endswitch;
                        ?>
                        <div class="notification" data-id="<?php echo $notification->id; ?>">
                            <div class="notification-info">
                                <h3 class="notification-topic"><?php echo $mainTopic; ?></h3>
                                <p class="notification-message"><?php echo $notificationContent; ?></p>
                                <p class="notification-time"><?php echo $notification->time; ?></p>
                            </div>
                            <!-- <button class="mark-as-read" data-id="<?php echo $notification->id; ?>">Mark as Read</button> -->
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>


    <script>
    // Function to mark all notifications as read using AJAX
    function markAllAsRead() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/farmer/markAllAsRead', true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Refresh notifications
                updateNotifications();
            }
        };

        xhr.send();
    }

    // Automatically mark all notifications as read when the page loads
    window.onload = function() {
        markAllAsRead();
    };
</script>

</body>

</html>


<?php require APPROOT . '/views/inc/footer.php'; ?>



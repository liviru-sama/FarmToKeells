<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>farmer/view_profile.js"></script>
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

<a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()" >
    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon" style="background: #65A534; transform: scale(1.28);">
</a></div>

<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/admin/logout">
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
                   
                    <a href="<?php echo URLROOT; ?>/admin/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                  
                    
                    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6"  >
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div></a>

                   
                    <a href="<?php echo URLROOT; ?>/admin/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/admin/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>
    


                        <a href="<?php echo URLROOT; ?>/admin/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Reply</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/admin/manageUsers" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Users</h6>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>


    <!-- Main content -->

    <main class="main-content" style=" height: 98%;">
    <h1>Notifications</h1>
<section class="notifications">

<div class="notification-container">
    <?php if (empty($data['notifications'])): ?>
        <p>You don't have any notifications yet.</p>
    <?php else: ?>
        <?php foreach ($data['notifications'] as $notification): ?>
            <?php switch ($notification->action):
                case 'new_order':
                    if ($notification->purchase_product !== NULL) {
                        $mainTopic = "New Order";
                        $notificationContent = "User '{$notification->user}' has placed a new order - {$notification->quantity} kgs of '{$notification->product}' for your Needlist item '{$notification->purchase_product}'";
                    } else {
                        $mainTopic = "New Order";
                        $notificationContent = "User '{$notification->user}' has placed a new order - {$notification->quantity} kgs of '{$notification->product}'";
                    }
                    break;
                case 'reply':
                    if ($notification->ccm_reply !== NULL) {
                        $mainTopic = "Reply from Collection Center Manager";
                        $notificationContent = "Collection Center Manager has replied '{$notification->ccm_reply}' for your Message";
                    } else {
                        $mainTopic = "Reply from Transportation Manager";
                        $notificationContent = "Transportation Manager has replied '{$notification->tm_reply}' for your Message";
                    }
                    break;
                case 'farmerreply':
                    $mainTopic = "Inquiry from Farmer";
                    $notificationContent = "User '{$notification->user}' has sent you an inquiry '{$notification->inquiry}'. Please respond promptly.";
                    break;
                case 'payment':
                    $mainTopic = "Payment Completed";
                    $notificationContent = "User '{$notification->user}'s Order for '{$notification->product}' with ID {$notification->order_id} has Completed just now. Its time to pay him Rs. {$notification->totalprice} /=";
                    break;
                case 'newuser':
                    $mainTopic = "New User Registration";
                    $notificationContent = "User '{$notification->user}' has just registered an account. Please take immediate action to accept the registration.";
                    break;
                case 'low':
                    $mainTopic = "Low Stock Alert";
                    $notificationContent = "The stock of '{$notification->product}' at the warehouse is running critically low, with only {$notification->quantity} kgs remaining. Please prioritize placing a new order for {$notification->product}.";
                    break;
            endswitch; ?>

            <div class="notification">
                <div class="notification-info">
                    <h3 class="notification-topic"><?php echo $mainTopic; ?></h3>
                    <p class="notification-message"><?php echo $notificationContent; ?></p>
                    <p class="notification-time"><?php echo $notification->time; ?></p>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
</div>

</section>


</main>

<script> function markAllAsRead() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/admin/markAllAsRead', true);

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
    };</script>
   
   
           

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

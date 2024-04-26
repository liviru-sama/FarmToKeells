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
                </a>
            </div>
            <div class="navbar-icon-container" data-text="Notifications">
                <a href="<?php echo URLROOT; ?>/transport/notifications" id="notificationsButton" onclick="toggleNotifications()">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon" style="background: #65A534; transform: scale(1.28);">
                </a>
            </div>
            <div class="navbar-icon-container" data-text="Logout">
                <a href="<?php echo URLROOT; ?>/transport/logout">
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
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    <a href="<?php echo URLROOT; ?>/tranport/requests" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2"> 
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Requests</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/salesorderapproved" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/monitor" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/monitor.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Monitor</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/drivers" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/driver.png" alt="" style="width: 50px; height: 50px;">
                            <h6>drivers</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/drivers" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/vehicle.png" alt="" style="width: 50px; height: 50px;">
                            <h6>vehicles</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/tm_chat" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inquiry</h6>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!-- Main content -->
    

    <main class="main-content">
    <h1>Transportation Manager Notifications</h1><br>
        <section class="notifications">

    <div class="notification-container">
        <?php if (empty($data['notifications'])): ?>
            <p>You don't have any notifications yet.</p>
        <?php else: ?>
            <?php foreach ($data['notifications'] as $notification): ?>
                <?php switch ($notification->action):
                    case 'reply':
                        $mainTopic = "Reply from Keells Admin";
                        $notificationContent = "Keells Admin has replied '{$notification->admin_reply}' for your Message";
                        break;

                    case 'new purchase order':
                        // 
                        break;

                    case 'price_update':
                        // 
                        break;

                    case 'payment_update':
                        // 
                        break;

                    case 'reply':
                        // 
                        break;

                    case 'replyupdate':
                        // 
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




</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

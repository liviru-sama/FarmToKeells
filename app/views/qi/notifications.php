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
                <a href="<?php echo URLROOT; ?>/qi/notifications" id="notificationsButton" onclick="toggleNotifications()">
<img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
                </a>
            </div>
            <div class="navbar-icon-container" data-text="Logout">
                <a href="<?php echo URLROOT; ?>/qi/logout">
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
                    
                    <a href="<?php echo URLROOT; ?>/qi/salesorderapproved" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Approved</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/qi/salesorderqualityapproved" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/quality.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Verified</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/qi/salesorderqualityrejected" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/fail.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Failed</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/qi/calendar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/calendar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Calendar</h6>
                        </div>
                    </a>
                   
                </div>
            </div>
        </section>
    </div>
    <main class="main-content" >
    <h1>Notifications</h1>
        <section class="notifications">

    <div class="notification-container">
    <?php if (empty($data['notifications'])): ?>
    <p>You don't have any notifications yet.</p>
<?php else: ?>
    <?php 
    // Sort notifications based on time, with the latest ones first
    usort($data['notifications'], function($a, $b) {
        return strtotime($b->time) - strtotime($a->time);
    });
    ?>
    <?php foreach ($data['notifications'] as $notification): ?>
        <?php 
        // Set notification content based on action
        switch ($notification->action):
            case 'reply':
                $mainTopic = "Reply from Keells Admin";
                $notificationContent = "Keells Admin has replied '{$notification->admin_reply}' for your Message";
                break;

            case 'order':
                $mainTopic = "New Approved Order";
                $notificationContent = "you hav received a new Approved Order with order ID '{$notification->order_id}' from '{$notification->user}' to test quality ";
                break;

           
        endswitch; 
        ?>
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
        xhr.open('GET', '<?php echo URLROOT; ?>/qi/markAllAsRead', true);

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
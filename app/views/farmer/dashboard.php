<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS;?>ccm/dashboard.css">
    <title>Dashboard - <?php echo SITENAME;?></title>
    <style>
    body,
    html {
        background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
        background-size: cover;
        height: 100%;
    }

    .navbar {
        position: fixed;
        left: 0%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        top: 0px;
        z-index: 1;
        height: 60px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-logo {
        width: 160px;
        height: auto;
        margin-right: auto;
    }

    .navbar-icons {
        display: flex;
        align-items: center;
    }

    .navbar-icon {
        width: 50px;
        height: auto;
        margin-left: 35px;
        box-shadow: 0 0.9rem 0.8rem rgba(0, 0, 0, 0.1);
        border-radius: 50px;
        padding: 5px;
    }

    .navbar-icon:hover {
        background: #65A534;
        transform: scale(1.08);
    }


    .navbar-icon-container {
        position: relative;
    }

    .navbar-icon-container[data-text]:hover::after {
        content: attr(data-text);
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #65A534;
        color: white;
        padding: 5px;
        border-radius: 5px;
        z-index: 2;
        white-space: nowrap;
    }



    .dashboard-container {
        top: 60px;

        padding-top: 80px;
    }
    </style>



</head>

<body>
    <?php if(isset($_SESSION['user_id'])): ?>
    <section class="header">
        <!-- Navbar -->
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
                        <div class="redcircle"></div>
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
            <div class="navbar-logo-container">
                <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
            </div>
        </div>

        <script>
        function goBack() {
            window.history.back();
        }
        </script>



    </section>
    <?php endif; ?>

    <div class="container" style="top:50%">
        <div class="dashboard-container">
            <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>">
                <div class="menu" data-name="p-1">
                    <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="">
                    <h3>Post Your available products</h3>
                </div>
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/purchaseorder">
                <div class="menu" data-name="p-2">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png">
                    <h3>Place Order For Their demand</h3>
                </div>
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/marketdemand">
                <div class="menu" data-name="p-3">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png">
                    <h3>Market demands and Product Prices</h3>
                </div>
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/view_payment">
                <div class="menu" data-name="p-4">
                    <img src="<?php echo URLROOT; ?>/public/images/pay.png">
                    <h3>Payments</h3>
                </div>
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/transport">
                <div class="menu" data-name="p-4">
                    <img src="<?php echo URLROOT; ?>/public/images/transport.png">
                    <h3>Transport</h3>
                </div>
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/inquiry">
                <div class="menu" data-name="p-4">
                    <img src="<?php echo URLROOT; ?>/public/images/inquiry.png">
                    <h3>Help</h3>
                </div>
            </a>
        </div>
    </div>
    <script>
    function updateNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/farmer/notify', true);

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
    </script>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
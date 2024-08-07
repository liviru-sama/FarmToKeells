

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/dashboard.css">
    
    <style>

body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }
        
            .navbar {
                position: fixed; /* Fixed position */
                left: 0%; /* Adjust as needed */
                width: 100%; /* Take up the remaining width */
                display: flex;
                justify-content: space-between; /* Distribute items along the main axis */
                align-items: center;
                padding: 20px;
                top: 0px; /* Stick to the top of the viewport */
                z-index: 1;
                height: 60px; /* Fixed height for navbar */
                /* Example background color */
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Example box shadow */
            }
        
            .navbar-logo {
                width: 160px; /* Fixed width for the logo */
                height: auto; /* Maintain aspect ratio */
                margin-right: auto; /* Push other elements away */
            }
            
            .navbar-icons {
                display: flex;
                align-items: center;
            }
            
            .navbar-icon {
                width: 50px; /* Increased width for icons */
                height: auto; /* Maintain aspect ratio */
                margin-left: 35px; /* Adjust spacing between icons */
                box-shadow: 0 0.9rem 0.8rem rgba(0, 0, 0, 0.1); /* Box shadow */
                border-radius: 50px; /* Border radius */
                padding: 5px; /* Increase the padding to create gap */
            }
        
            .navbar-icon:hover {
                background: #65A534;
                transform: scale(1.08);
            }
            
            .navbar-icon-container {
    position: relative;
}

.navbar-icon-container:hover::after {
            content: attr(data-text); /* Display the value of the data-text attribute */
            position: absolute;
            top: 100%; /* Position the text below the icon */
            left: 50%; /* Center the text horizontally */
            transform: translateX(-50%); /* Center the text horizontally */
            background-color: #65A534; /* Background color for the text */
            color: white; /* Text color */
            padding: 5px; /* Padding around the text */
            border-radius: 5px; /* Border radius for the text */
            z-index: 2; /* Ensure the text appears above other elements */
            white-space: nowrap; /* Prevent text from wrapping */
        }

.dashboard-container {
    top: 60px; /* Height of the navbar */
   
    padding-top: 80px; /* Additional padding to compensate for navbar height */
    /* Additional styles for the dashboard container */
}


            </style>
</head>
<body>
<section class="header">
            <!-- Navbar -->
            <!-- Navbar -->
        <div class="navbar">
    <div class="navbar-icons">
        <div class="navbar-icon-container" data-text="Go Back">
            <a href="#" id="backButton" onclick="goBack()">
                <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
            </a>
        </div>
        <div class="navbar-icon-container" data-text="Notifications">
            <a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <div class="redcircle"></div>
<img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
            </a>
        </div>
        <div class="navbar-icon-container" data-text="Logout">
            <a href="<?php echo URLROOT; ?>/admin/logout">
                <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
            </a>
        </div>
    </div>
    <div class="navbar-logo-container">
        <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
    </div>
</div>

        <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
        </section>
   

            <div class="container" style="top:50%">
                <div class="dashboard-container">
                    
              
        
                  
        
                        <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar">
                        <div class="menu" data-name="p-1">

                        <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="">
                        <h3>Stock Overview</h3>
                    </div></a>
        
                        <a href="<?php echo URLROOT; ?>/admin/purchaseorder">
                        <div class="menu" data-name="p-2">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="">
                        <h3>View Orders</h3>
                    </div></a>
        
                    <a href="<?php echo URLROOT; ?>/admin/manageUsers">
                    <div class="menu" data-name="p-3">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="">
                        <h3>Manage users</h3>
                    </div></a>
        
                  
        
                       
                        

                    <a href="<?php echo URLROOT; ?>/admin/payment">
                        <div class="menu" data-name="p-6">

                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="">
                            <h3>View Payments</h3>
                    </div></a>
        

                    <a href="<?php echo URLROOT; ?>/admin/inquiry">
                        <div class="menu" data-name="p-6">

                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="">
                            <h3>reply Inquiries</h3>
                    </div></a>
        
                </div>
            </div>
        </section>


        
    </section>

    <script>function updateNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/admin/notify', true);

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
    setInterval(updateNotifications, 5000);</script>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS;?>admin/selectadmin.css">
    <title><?= $data['title'] ?></title>

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

        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar-logo-container {
    margin-right: 20px; /* Adjust the margin as needed */
}


   

    </style>
</head>
<body>
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
           
            <div class="menu" data-name="p-2">
                <a href="<?php echo URLROOT; ?>/qi/salesorderapproved">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png">
                    <h3>View Approved Orders</h3>
                </a>
            </div>

            <div class="menu" data-name="p-2">
                <a href="<?php echo URLROOT; ?>/qi/salesorderqualityapproved">
                    <img src="<?php echo URLROOT; ?>/public/images/quality.png">
                    <h3>View Quality Approved Orders</h3>
                </a>
            </div>

            <div class="menu" data-name="p-2">
                <a href="<?php echo URLROOT; ?>/qi/salesorderqualityrejected">
                    <img src="<?php echo URLROOT; ?>/public/images/fail.png">
                    <h3>View Quality Rejected Orders</h3>
                </a>
            </div>
            <div class="menu" data-name="p-2">
                <a href="<?php echo URLROOT; ?>/qi/dashbaord">
                    <img src="<?php echo URLROOT; ?>/public/images/calendar.png">
                    <h3>View Schedule</h3>
                </a>
            </div>

            
           
            
           
        </div>
    </div>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

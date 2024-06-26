

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?php echo SITENAME; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>admin/selectadmin.css">
    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .navbar {
                position: fixed; /* Fixed position */
                left: 0%; /* Adjust as needed */
                right: 0%; /* Adjust as needed */
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
    width: auto; /* Allow the logo to adjust its width based on its content */
    height: 40px; /* Set a fixed height for consistency */
    margin-right: 30px; /* Adjust as needed */
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
            top: 80px; /* Height of the navbar */
            padding-top: 80px; /* Additional padding to compensate for navbar height */
            /* Additional styles for the dashboard container */
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
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container" >
        
                    
                    <a href="<?php echo URLROOT; ?>/admin/admin_login">
                    <div class="menu" data-name="p-1">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="">
                   
                        <h3>Keells Admin</h3>
                    </div>
                    </a>
                   
                        <a href="<?php echo URLROOT; ?>/ccm/ccm_login">
                        <div class="menu" data-name="p-2">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash9.png" alt=""> 
                        
                        <h3>Collection Centre manager</h3>
                    </div></a>
        
                        <a href="<?php echo URLROOT; ?>/transport/tm_login">
                        <div class="menu" data-name="p-3">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash8.png" alt="">
                        <h3>Transporatation manager</h3>
                    </div></a>
        
                    <a href="<?php echo URLROOT; ?>/qi/qi_login">
                        <div class="menu" data-name="p-4">

                        <img src="<?php echo URLROOT; ?>/public/images/quality.png" alt="">
                        <h3>Quality Inspector</h3>
                    </div></a>
        
                    
        
        
                </div>
            </div>
        </section>
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

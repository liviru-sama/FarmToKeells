



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>ccm/dashboard.css">
        <title><?php echo SITENAME;?></title>
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

/* Adjust container styles as needed */
</style>    </head>
<body>
<?php if(isset($_SESSION['user_id'])): ?>
        <section class="header">
            <!-- Navbar -->
            <div class="navbar">
                <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo" style="left: 0;">
                <div class="navbar-icons">
               
                    <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>

        <div class="navbar-icon-container" data-text="Contact">
        <a href="<?php echo URLROOT; ?>/users/contact" >
                        <img src="<?php echo URLROOT; ?>/public/images/mail.png" alt="back" class="navbar-icon">
                    </a></div>

                    <div class="navbar-icon-container" data-text="View Profile">
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon">
                    </a></div>

<div class="navbar-icon-container" data-text="Logout">
        <a href="<?php echo URLROOT; ?>/ccm/logout">
            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a></div>

                </div>
            </div>
        </section>
    <?php endif; ?>

            <div class="container" style="top:50%">
                <div class="dashboard-container">
                    
              
        
                  
                    <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>">
                    <div class="menu" data-name="p-1">

                    <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="">


                        <h3>Post Your available products</h3>
                       
                    </div> </a>


        
                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder">
                    <div class="menu" data-name="p-2">
                
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" >
                        <h3>Place Order For Their demand</h3>
                    </div></a>
                   
        
                   
                    <a href="<?php echo URLROOT; ?>/farmer/marketdemand">
                    <div class="menu" data-name="p-3">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png">
                        <h3>Market demands and Product Prices</h3>
                        
                    </div></a>
        
                    
                    <a href="<?php echo URLROOT; ?>/farmer/payments">
                    <div class="menu" data-name="p-4">
                        <img src="<?php echo URLROOT; ?>/public/images/pay.png">
                        <h3>Payments</h3>
                        
                    </div></a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport">
                    <div class="menu" data-name="p-4">
                        <img src="<?php echo URLROOT; ?>/public/images/transport.png">
                        <h3>Transport</h3>
                        
                    </div></a>

                    <a href="<?php echo URLROOT; ?>/farmer/inquiry">
                    <div class="menu" data-name="p-4">
                        <img src="<?php echo URLROOT; ?>/public/images/inquiry.png">
                        <h3>Inquiries</h3>
                        
                    </div></a>
        
                    
                       
        
        
                </div>
            </div>

    

</body>
</html>


<?php require APPROOT . '/views/inc/footer.php'; ?>







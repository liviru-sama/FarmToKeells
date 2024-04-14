



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
            }</style>    </head>
<body>
<?php if(isset($_SESSION['user_id'])): ?>
        <section class="header">
            <!-- Navbar -->
            <div class="navbar">
                <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo" style="left: 0;">
                <div class="navbar-icons">
                    <a href="<?php echo URLROOT; ?>/users/contact" id="backButton"  onclick="goBack()">
                        <img src="<?php echo URLROOT; ?>/public/images/mail.png" alt="back" class="navbar-icon">
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon">
                    </a>
                    <a href="<?php echo URLROOT; ?>/users/user_login">
                        <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
                    </a>
                    <!-- Add more icons as needed -->
                </div>
            </div>
        </section>
    <?php endif; ?>

            <div class="container" style="top:50%">
                <div class="dashboard-container">
                    
                <a href="<?php echo URLROOT; ?>/farmer/purchaseorder">
                    <div class="menu" data-name="p-1">
                
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" >
                        <h3>Place Order</h3>
                    </div></a>
        
                  
                    <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>">
                    <div class="menu" data-name="p-2">

                    <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="">


                        <h3>Post Your available products</h3>
                       
                    </div> </a>
        
                  
                    <a href="<?php echo URLROOT; ?>/farmer/notifications">
                    <div class="menu" data-name="p-3">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png">
                        <h3>Notifications</h3>
                        
                    </div></a>
        
                   
                    <a href="<?php echo URLROOT; ?>/farmer/market_prices">
                    <div class="menu" data-name="p-4">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png">
                        <h3>Market demands and Product Prices</h3>
                        
                    </div></a>
        
                    
                    <a href="<?php echo URLROOT; ?>/farmer/payments">
                    <div class="menu" data-name="p-5">
                        <img src="<?php echo URLROOT; ?>/public/images/pay.png">
                        <h3>Payments</h3>
                        
                    </div></a>
        
                    
                        <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png">
                            <h3>Manage Profile</h3>
                           
                    </div> </a>
        
        
                </div>
            </div>

    

</body>
</html>


<?php require APPROOT . '/views/inc/footer.php'; ?>







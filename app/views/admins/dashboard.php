<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" href="<?php echo CSS;?>admin-dashboard.css">
    
</head>
<body>
    
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
        
                    <div class="menu" data-name="p-1">
                    <a href="<?php echo URLROOT; ?>/admins/place_order">
                    <img src="<?php echo URLROOT; ?>/public/images/wasri/dash1.png" ></a>
                        <h3>Place Orders</h3>
                    </div>
        
                    <div class="menu" data-name="p-2">
                    <img src="<?php echo URLROOT; ?>/public/images/wasri/dash2.png" ></a>
                        <h3>View Orders</h3>
                    </div>
        
                    <div class="menu" data-name="p-3">
                    <a href="<?php echo URLROOT; ?>/admin/notification">
                    <img src="<?php echo URLROOT; ?>/public/images/wasri/dash3.png" ></a>
                        <h3>Notifications</h3>
                    </div>
        
                    <div class="menu" data-name="p-4">
                    <img src="<?php echo URLROOT; ?>/public/images/wasri/dash4.png" ></a>
                        <h3>Market demands and Product Prices</h3>
                    </div>
        
                    <div class="menu" data-name="p-5">
                    <img src="<?php echo URLROOT; ?>/public/images/wasri/dash5.png" ></a>
                        <h3>Payments</h3>
                    </div>
        
                    <div class="menu" data-name="p-6">
                        <a href="farmer-profile.php">
                        <img src="<?php echo URLROOT; ?>/public/images/wasri/dash6.png" ></a>
                            <h3>Manage Profile</h3>
                        </a>
                    </div>
        
        
                </div>
            </div>
        </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
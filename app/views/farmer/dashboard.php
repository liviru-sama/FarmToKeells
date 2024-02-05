<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>dashboard.css">
        <title><?php echo SITENAME;?></title>
    </head>
<body>
    
            <div class="container">
                <div class="dashboard-container">
        
                    <div class="menu" data-name="p-1">
                    <a href="<?php echo URLROOT; ?>/farmer/place_orders">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" ></a>
                        <h3>Place Orders</h3>
                    </div>
        
                    <div class="menu" data-name="p-2">
                    <a href="<?php echo URLROOT; ?>/farmer/view_orders">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash2.png" alt=""></a>
                        <h3>View Orders</h3>
                    </div>
        
                    <div class="menu" data-name="p-3">
                    <a href="<?php echo URLROOT; ?>/farmer/notifications">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png"></a>
                        <h3>Notifications</h3>
                    </div>
        
                    <div class="menu" data-name="p-4">
                    <a href="<?php echo URLROOT; ?>/farmer/market_prices">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png"></a>
                        <h3>Market demands and Product Prices</h3>
                    </div>
        
                    <div class="menu" data-name="p-5">
                    <a href="<?php echo URLROOT; ?>/farmer/payments">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash5.png"></a>
                        <h3>Payments</h3>
                    </div>
        
                    <div class="menu" data-name="p-6">
                        <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png"></a>
                            <h3>Manage Profile</h3>
                    </div>
        
        
                </div>
            </div>

    

</body>
</html>


<?php require APPROOT . '/views/inc/footer.php'; ?>







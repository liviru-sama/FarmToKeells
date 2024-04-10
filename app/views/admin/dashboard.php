<?php require APPROOT . '/views/inc/header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/dashboard.css">
    
</head>
<body>
    <section class="header">
        
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
        
                        <a href="<?php echo URLROOT; ?>/admin/stock_overview">
                        <div class="menu" data-name="p-1">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/stock.png" alt="">
                        <h3>Stock Overview</h3>
                    </div></a>
        
                        <a href="<?php echo URLROOT; ?>/admin/selectorder">
                        <div class="menu" data-name="p-2">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="">
                        <h3>View Orders</h3>
                    </div></a>
        
                    <a href="farmer-notifications.php">
                    <div class="menu" data-name="p-3">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="">
                        <h3>Manage users</h3>
                    </div></a>
        
                    <a href="market-demands.html">
                    <div class="menu" data-name="p-4">

                         <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="">
                        <h3>Market demands and Product Prices</h3>
                    </div></a>
        
                        <a href="kpi.html">
                        <div class="menu" data-name="p-5">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="">
                        <h3>Notifications</h3>
                    </div></a>
        
                        <a href="">
                        <div class="menu" data-name="p-6">

                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/error.png" alt="">
                            <h3>View Inquiries</h3>
                    </div></a>
        
        
                </div>
            </div>
        </section>


        
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

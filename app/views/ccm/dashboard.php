<?php require APPROOT . '/views/inc/header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/dashboard.css">
    
</head>
<body>
    <section class="header">
        
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
        
                    <div class="menu" data-name="p-1">
                        <a href="<?php echo URLROOT; ?>/ccm/view_inventory">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""></a>
                        <h3>Update inventory</h3>
                    </div>
        
                    <div class="menu" data-name="p-2">
                        <a href="<?php echo URLROOT; ?>/ccm/purchaseorder">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash2.png" alt=""></a>
                        <h3>Purchase Orders</h3>
                    </div>
        
                    <div class="menu" data-name="p-3">
                    <a href="farmer-notifications.php">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt=""></a>
                        <h3>Notifications</h3>
                    </div>
        
                    <div class="menu" data-name="p-4">
                    <a href="market-demands.html">
                         <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt=""></a>
                        <h3>Market demands and Product Prices</h3>
                    </div>
        
                    <div class="menu" data-name="p-5">
                        <a href="kpi.html">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash5.png" alt="">
                        <h3>Reporting And Analysis</h3>
                        </a>
                    </div>
        
                    <div class="menu" data-name="p-6">
                        <a href="">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="">
                            <h3>Manage Profile</h3>
                        </a>
                    </div>
        
        
                </div>
            </div>
        </section>


        
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

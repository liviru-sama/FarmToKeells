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

                        <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="">
                        <h3>Stock Overview</h3>
                    </div></a>
        
                        <a href="<?php echo URLROOT; ?>/admin/selectorder">
                        <div class="menu" data-name="p-2">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="">
                        <h3>View Orders</h3>
                    </div></a>
        
                    <a href="<?php echo URLROOT; ?>/admin/manageUsers"">
                    <div class="menu" data-name="p-3">

                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="">
                        <h3>Manage users</h3>
                    </div></a>
        
                    <a href="market-demands.html">
                    <div class="menu" data-name="p-4">

                         <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="">
                        <h3>Monitor Transport </h3>
                    </div></a>
        
                       
                        

                    <a href="">
                        <div class="menu" data-name="p-6">

                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="">
                            <h3>View Payments</h3>
                    </div></a>
        

                    <a href="">
                        <div class="menu" data-name="p-6">

                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="">
                            <h3>reply Inquiries</h3>
                    </div></a>
        
                </div>
            </div>
        </section>


        
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

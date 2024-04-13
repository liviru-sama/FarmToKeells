<?php require APPROOT . '/views/inc/header.php';

?>


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
        
                        <a href="<?php echo URLROOT; ?>/ccm/view_inventory">
                        <div class="menu" data-name="p-1">
                        <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="">
                        <h3>Update Inventory</h3>
                    </div></a>
        
                        <a href="<?php echo URLROOT; ?>/ccm/purchaseorder">
                        <div class="menu" data-name="p-2">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="">
                        <h3>Orders</h3>
                    </div></a>
        
                    <a href="<?php echo URLROOT; ?>/ccm/view_price">
                    <div class="menu" data-name="p-3">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="">
                        <h3>Market demands and Product Prices</h3>
                    </div></a>
        
                    <a href="<?php echo URLROOT; ?>/ccm/stock_overviewbar">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="">
                            <h3>Stock Levels Overview</h3>
                       
                    </div> </a> 
                    <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator">
                    <div class="menu" data-name="p-4">
                         <img src="<?php echo URLROOT; ?>/public/images/report.png" alt="">
                        <h3>Report</h3>
                    </div></a>
        
                    <a  href="<?php echo URLROOT; ?>/ccm/displayReportGenerator">
                    <div class="menu" data-name="p-5">
                        <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="">
                        <h3>Post Inquriies</h3>
                       
                    </div> </a>
        
                  
                       
        
        
                </div>
            </div>
        </section>


        
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

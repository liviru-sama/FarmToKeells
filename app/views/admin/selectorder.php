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
                        <a href="<?php echo URLROOT; ?>/admin/salesorder">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/stock.png" alt=""></a>
                        <h3>View Sales Orders</h3>
                    </div>
        
                    <div class="menu" data-name="p-2">
                        <a href="<?php echo URLROOT; ?>/admin/purchaseorder">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""></a>
                        <h3>View Purchase Orders</h3>
                    </div>
        
                    
                 
        
                </div>
            </div>
        </section>


        
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

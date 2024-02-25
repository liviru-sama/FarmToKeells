<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>dashboards.css">
        <title><?= $data['title'] ?></title>
    </head>
    <body>
        <div class="container">
            <div class="dashboard-container">
                
                <div class="menu" data-name="p-1">
                    <a href="<?php echo URLROOT; ?>/transport/pending_requests">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash2.png">
                    <h3>Requests</h3></a>
                </div>
    
                <div class="menu" data-name="p-2">
                    <a href="<?php echo URLROOT; ?>/transport/orders">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png">
                    <h3>Orders</h3></a>
                </div>
    
                <div class="menu" data-name="p-3">
                    <a href="<?php echo URLROOT; ?>/monitor/index">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png">
                    <h3>Transport Monitor</h3></a>
                </div>
    
                <div class="menu" data-name="p-4">
                    <a href="<?php echo URLROOT; ?>/notifications">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png">
                    <h3>Notifications</h3></a>
                </div>

            </div>
        </div>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
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
                    <a href="<?php echo URLROOT; ?>/monitor/driverList">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash2.png">
                    <h3>Drivers</h3></a>
                </div>
    
                <div class="menu" data-name="p-2">
                    <a href="<?php echo URLROOT; ?>/monitor/vehicleList">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash2.png">
                    <h3>Vehicles</h3></a>
                </div>

            </div>
        </div>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
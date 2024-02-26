<?php require APPROOT . '/views/inc/header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT ADMIN </title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>admin/selectadmin.css">
    
</head>
<body>
    <section class="header">
        <nav>
            
            
            
        </nav>
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
        
                    <div class="menu" data-name="p-1">
                    <a href="<?php echo URLROOT; ?>/admin/admin_login">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="">
                    </a>
                        <h3>Keells Admin</h3>
                    </div>
        
                    <div class="menu" data-name="p-2">
                        <a href="<?php echo URLROOT; ?>/ccm/ccm_login">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash9.png" alt=""> 
                        </a>
                        <h3>Collection Centre manager</h3>
                    </div>
        
                    <div class="menu" data-name="p-3">
                        <a href="<?php echo URLROOT; ?>/transport/tm_login">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash8.png" alt="">
                         </a>
                        <h3>Transporatation manager</h3>
                    </div>
        
                    
        
        
                </div>
            </div>
        </section>
    </section>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

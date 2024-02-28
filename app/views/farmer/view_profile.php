<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>farmer/view_profile.css">
        <script src="<?php echo JS;?>farmer/view_profile.js"></script>
        <title><?php echo SITENAME;?></title>
    </head>
<body>
    <section class="form">
        <div class="center">
            <h1>Farmer Profile</h1>
            <form method="post" action="">
                    <div class="menu">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="">
                        <?php
                        echo '<h3>Hello, ' . $data['name'] . '</h3>';
                        ?>
                    </div>
            </form>


            
            <a href="<?php echo URLROOT; ?>/farmer/update_profile"><input type="button" value="Update Profile" class="form-button"></a>  

        
            
            
        </div>
    </section>


</body>
</html>



<?php require APPROOT . '/views/inc/footer.php'; ?>

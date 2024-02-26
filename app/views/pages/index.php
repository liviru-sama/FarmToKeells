

<?php require APPROOT . '/views/inc/header.php'; ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>index.css">
        <title><?php echo SITENAME;?></title>
    </head>
    <body>
    <div class="container">
        <section class="body">
            <div class="text-box">
                                 
                    <h1>FarmToKeells</h1>
                    <p>Inventory Management System</p>
                    <a href="<?php echo URLROOT; ?>/users/register" class="hero-btn">Register</a>
                    <a href="<?php echo URLROOT; ?>/users/user_login" class="hero-btn">Login</a>
                    <div class="admin-login-link">
                        Are you an Admin? <a href="<?php echo URLROOT; ?>/admin/admin_login">Click Here</a>
                    </div>
                   
            </div>
            
        </section>
        </div>
    </body>

<?php require APPROOT . '/views/inc/footer.php'; ?>






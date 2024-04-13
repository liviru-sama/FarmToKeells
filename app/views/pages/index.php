



<?php 
require APPROOT . '/views/inc/header.php';  // Prevent caching
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>


<!DOCTYPE html>
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
</br></br>

                    <div class="admin-login-link">
                        Are you an Admin? <a href="<?php echo URLROOT; ?>/pages/selectadmin">Click Here</a>
                    </div>
                   
            </div>
            
        </section>
        </div>
        <script>
    window.onload = function() {
    if (window.history && window.history.replaceState) {
        // Replace the current URL with the index page URL in the browser's history
        window.history.replaceState(null, null, '<?php echo URLROOT; ?>/pages/index.php');
    }
};


</script>

</script>

    </body>

<?php require APPROOT . '/views/inc/footer.php'; ?>






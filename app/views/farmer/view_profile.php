<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>farmer-view-profile.css">
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
                        echo '<h3>Hello, ' . $_SESSION['name'] . '</h3>';
                        ?>


                    </div>

                    

            </form>


            <a href="view-profile.php"><input type="button" value="View" class="form-button"></a>
            <a href="update-profile.php"><input type="button" value="Update" class="form-button"></a>  
            <a href="javascript:void(0);" onclick="confirmDelete();"><input type="button" value="Delete" class="form-button"></a>

        
            
            
        </div>
    </section>

    <script>
        function confirmDelete() {
        if (confirm("Are you sure you want to delete your profile?")) {
        // Redirect to the delete-profile.php page to delete the user
        window.location.href = "delete-profile.php";
            }
        }
</script>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

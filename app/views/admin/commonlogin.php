<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Common Login</title>
    <link rel="stylesheet" href="<?php echo CSS;?>admin-comon-login.css">
    
</head>
<body>
    <section class="header">
        <nav>
            
            <a href="index.php"><img src="<?php echo URLROOT; ?>/public/images/logoBlack.png" ></a>
            <div class="nav-links">
                <ul>
                    <li><a href="farmer-profile.php">Account</a></li>
                    <li><a href="inquiries-support.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
        
                    <div class="menu" data-name="p-1">
                    <a href="admin-login.php">
                    <img src="<?php echo URLROOT; ?>/public/images/wasri/dash7.png" ></a>
                    </a>
                        <h3>Keells Admin</h3>
                    </div>
        
                    <div class="menu" data-name="p-2">
                        <a href="ccm-login.php">
                        <img src="<?php echo URLROOT; ?>/public/images/wasri/dash8.png" ></a>
                        </a>
                        <h3>Collection Centre manager</h3>
                    </div>
        
                    <div class="menu" data-name="p-3">
                        <a href="tm-login.php">
                        <img src="<?php echo URLROOT; ?>/public/images/wasri/dash9.png" ></a>
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

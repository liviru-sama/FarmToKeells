<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <script src="<?php echo JS;?>add_product.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/add_product.css">
    <style>
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <section class="header">
        
    </section>
    <section class="form">
        <div class="center">
            <h1>ADMIN LOGIN</h1>
            
            <?php if (!empty($data['admin_password_err'])): ?>
                <div class="error-message"><?php echo $data['admin_password_err']; ?></div>
            <?php endif; ?>
            <form action='<?php echo URLROOT; ?>/admin/admin_login' method="post" id="myForm">

            <div class="text-field">
                    <input type="text" name="admin_username" required>
                    <span></span>
                    <label>Username</label>
                </div>

                <div class="text-field">
                    <input type="password" name="admin_password"  required>
                    <spaan></spaan>
                    <label>Password</label>
                </div>

                
                <input type="submit" value="Login">





               
            </form>
        </div>
    </section>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

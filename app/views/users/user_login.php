<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>login.css">
        <script src="<?php echo JS;?>login.js"></script>
        <title><?php echo SITENAME;?></title>
    </head>
    <body>
    <section class = "form">
        <div class="center">
            
            <h1>Login</h1>
            <div class="flash-message">
                <?php flash('register_success'); ?>
            </div>
            <form method="post" action="<?php echo URLROOT; ?>/users/user_login">

                <div class="text-field">
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="error" id="username-error"><?php echo $data['username_err']; ?></div>


                <div class="text-field">
                    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="error" id="password-error"><?php echo $data['password_err']; ?></div>

                <div class="pass">Forgot Password?</div>
                <input type="submit" name="Login" value="Login">
                <div class="signup-link">
                    Not Registered? <a href="<?php echo URLROOT; ?>/users/register">Signup</a>
                </div>
            </form>
        </div>
    </section>
        
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>





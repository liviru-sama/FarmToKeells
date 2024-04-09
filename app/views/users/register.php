<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>register.css">
        <script src="<?php echo JS;?>register.js"></script>
        <title><?php echo SITENAME;?></title>
    </head>
    <body>
    <section class="form">
        <div class="center">
            <h1>Farmer Registration</h1>
            <form action="<?php echo URLROOT; ?>/users/register" method="post" >
                <div class="text-field">
                    <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" required>
                    <span></span>
                    <label>Name</label>
                </div>
                <div class="error" id="name-error"><?php echo $data['name_err']; ?></div>
                    
                <div class="text-field">
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="error" id="username-error"><?php echo $data['username_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>" required>
                    <span></span>
                    <label>E-mail Address</label>
                </div>
                <div class="error" id="email-error"><?php echo $data['email_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="nic" id="nic" value="<?php echo $data['nic']; ?>" required>
                    <span></span>
                    <label>NIC Number</label>
                </div>
                <div class="error" id="nic-error"><?php echo $data['nic_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="mobile" id="mobile" value="<?php echo $data['mobile']; ?>" required>
                    <span></span>
                    <label>Mobile Number</label>
                </div>
                <div class="error" id="mobile-error"><?php echo $data['mobile_err']; ?></div>

                <div class="text-field">
                    <select name="province" id="province" value="<?php echo $data['province']; ?>" required>
                        <option value="1">Western</option>
                        <option value="2">Southern</option>
                        <option value="3">Central</option>
                </div>

                <!-- <div class="text-field">
                    <select name="province" id="province" value="<?php echo $data['province']; ?>" required>
                        <option value="1">Western</option>
                        <option value="2">Southern</option>
                        <option value="3">Central</option>
                </div> -->

               

                

                <div class="text-field">
                    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" required>
                    <span></span>
                    <label>Password</label> 
                </div>
                <div class="error" id="password-error"><?php echo $data['password_err']; ?></div>
    
                <div class="text-field">
                    <input type="password" name="cpassword" id="cpassword" value="<?php echo $data['cpassword']; ?>" required>
                    <span></span>
                    <label>Confirm Password</label>
                </div>
                <div class="error" id="cpassword-error"><?php echo $data['cpassword_err']; ?></div>

                <input type="submit" value="Register">
                <div class="login-link">
                    Already a user? <a href="<?php echo URLROOT; ?>/users/user_login">Click Here</a>
                </div>
            </form>
        </div>
    </section>

    <!-- <div class="container">
        <div class="title">Farmer Registration</div>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" required>
                    <div class="error" id="name-error"><?php echo $data['name_err']; ?></div>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
                    <div class="error" id="username-error"><?php echo $data['username_err']; ?></div>
                </div>
                <div class="input-box">
                    <span class="details">E-mail Address</span>
                    <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>" required>
                    <div class="error" id="email-error"><?php echo $data['email_err']; ?></div>
                </div>
                <div class="input-box">
                    <span class="details">NIC Number</span>
                    <input type="text" name="nic" id="nic" value="<?php echo $data['nic']; ?>" required>
                    <div class="error" id="nic-error"><?php echo $data['nic_err']; ?></div>
                </div>
                <div class="input-box">
                    <span class="details">Mobile Number</span>
                    <input type="text" name="mobile" id="mobile" value="<?php echo $data['mobile']; ?>" required>
                    <div class="error" id="mobile-error"><?php echo $data['mobile_err']; ?></div>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" required>
                    <div class="error" id="password-error"><?php echo $data['password_err']; ?></div>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="cpassword" id="cpassword" value="<?php echo $data['cpassword']; ?>" required>
                    <div class="error" id="cpassword-error"><?php echo $data['cpassword_err']; ?></div> 
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
            <div class="login-link">
                Already a user? <a href="<?php echo URLROOT; ?>/users/user_login">Click Here</a>
            </div>
        </form>
    </div> -->
        
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>





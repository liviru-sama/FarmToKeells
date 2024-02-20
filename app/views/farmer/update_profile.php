<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>farmer/update_profile.css">
        <script src="<?php echo JS;?>farmer/update_profile.js"></script>
        <title><?php echo SITENAME;?></title>
    </head>
    <body>

    <section class="form">
        <div class="center">
            <h1>Update User Profile</h1>
            <form action="<?php echo URLROOT; ?>/farmer/update_profile" method="post" >
                <div class="text-field">
                <label>Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" required>
                    <span></span>
                    
                </div>
                <div class="error" id="name-error"><?php echo $data['name_err']; ?></div>
                    
                <div class="text-field">
                <label>Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
                    <span></span>
                    
                </div>
                <div class="error" id="username-error"><?php echo $data['username_err']; ?></div>

                <div class="text-field">
                <label>E-mail Address</label>
                    <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>" required>
                    <span></span>
                    
                </div>
                <div class="error" id="email-error"><?php echo $data['email_err']; ?></div>

                <div class="text-field">
                <label>NIC Number</label>
                    <input type="text" name="nic" id="nic" value="<?php echo $data['nic']; ?>" required>
                    <span></span>
                    
                </div>
                <div class="error" id="nic-error"><?php echo $data['nic_err']; ?></div>

                <div class="text-field">
                <label>Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" value="<?php echo $data['mobile']; ?>" required>
                    <span></span>
                    
                </div>
                <div class="error" id="mobile-error"><?php echo $data['mobile_err']; ?></div>

                <div class="text-field">
                <label>Password</label> 
                    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" required>
                    <span></span>
                    
                </div>
                <div class="error" id="password-error"><?php echo $data['password_err']; ?></div>

                <a href="<?php echo URLROOT; ?>/farmer/view_profile"><input type="button" value="Back" class="form-button"></a>
                <input type="button" onclick="clearFields()" value="Reset" class="form-button"></a>
                <button type="submit" name="update_profile">Update</button>
                
            </form>
        </div>
    </section>




            <!-- <form method="post" action="<?php echo URLROOT; ?>/farmer/update_profile">
                <table class="profile-data">
                    <tr>
                        <th>Name - </th>
                        <td><input type="text" name="name" value="<?php echo $data['name']; ?>"></td>
                    </tr>

                    <div class="text-field">
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="error" id="username-error"><?php echo $data['username_err']; ?></div>




                    <tr>
                        <th>Username -  </th>
                        <td><input type="text" name="username" value="<?php echo $data['username']; ?>"></td>
                    </tr>
                    <tr>
                        <th>E-mail - </th>
                        <td><input type="text" name="email" value="<?php echo $data['email']; ?>"></td>
                    </tr>
                    <tr>
                        <th>NIC Number   - </th>
                        <td><input type="text" name="nic" value="<?php echo $data['nic']; ?>"></td>
                    </tr>
                    <tr>
                        <th>Mobile Number   - </th>
                        <td><input type="text" name="mobile" value="<?php echo $data['mobile']; ?>"></td>
                    </tr>
                    <tr>
                        <th>Password   - </th>
                        <td><input type="password" name="password" value=""></td>
                    </tr>
                </table>

                
                

                <a href="<?php echo URLROOT; ?>/farmer/view_profile"><input type="button" value="Back" class="form-button"></a>
                <input type="button" onclick="clearFields()" value="Reset" class="form-button"></a>
                <button type="submit" name="update_profile">Update</button>
                

                
            </form> -->
        </div>
    </section>
        


    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>



<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>farmer/update_profile.css">
    <script src="<?php echo JS;?>farmer/update_profile.js"></script>
    <title><?php echo SITENAME; ?> - Update Profile</title>
</head>
<body>



    <div class="card-white">
                    <p class="p-regular-grey">User Account</p>
                    <div class="subgrid-4">

                        <div class="rectangle">
                            
                            <table>
                                <tr>
                                    <td class="p-regular-grey">Username</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_username'];?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Name</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_name'];?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">E-mail</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_email'];?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">Mobile</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_mobile'];?></td>
                                </tr>
                                <tr>
                                    <td class="p-regular-grey">NIC</td>
                                    <td class="p-regular-grey">:</td>
                                    <td class="p-title"><?php echo $_SESSION['user_nic'];?></td>
                                </tr>
                                
                            </table>
                        </div>

                        <div class="rectangle">
                            <p>Change Username</p> <?php echo '<p>' . flash('user_message') . '</p>';?>
                            <form action="<?php echo URLROOT; ?>/farmer/updateUsername/<?php echo $_SESSION['user_id']; ?>" method="POST" class="subgrid-1">
                                <label for="nusername" class="p-regular-grey">New Username :</label>
                                <input type="text" id="new_username" name="new_username" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-username-error"><?php echo $data['new_username_err']; ?></div> -->
                            </form>
                        </div>
                        <div class="rectangle">
                            <p>Change Name</p><?php echo '<p>' . flash('user_message') . '</p>';?>
                            <form action="<?php echo URLROOT;?>/farmer/updateName/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="nnamec" class="p-regular-grey">New Name :</label>
                                <input type="text" id="new_name" name="new_name" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-name-error"><?php echo $data['new_name_err']; ?></div> -->
                            </form>
                        </div>
                        <div class="rectangle">
                            <p>Change Email</p><?php echo '<p>' . flash('user_message') . '</p>';?>
                            <form action="<?php echo URLROOT;?>/farmer/updateEmail/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="nemail" class="p-regular-grey">New E-mail :</label>
                                <input type="text" id="new_email" name="new_email" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-email-error"><?php echo $data['new_email_err']; ?></div> -->
                            </form>
                        </div>
                        <div class="rectangle">
                            <p>Change Mobile</p><?php echo '<p>' . flash('user_message') . '</p>';?>
                            <form action="<?php echo URLROOT;?>/farmer/updateMobile/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="nmobile" class="p-regular-grey">New Mobile :</label>
                                <input type="text" id="new_mobile" name="new_mobile" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-mobile-error"><?php echo $data['new_mobile_err']; ?></div> -->
                            </form>
                        </div>
                        

                        

                        <div class="rectangle">
                            <p>Change Password</p><?php echo '<p>' . flash('user_message') . '</p>';?>
                            <form action="<?php echo URLROOT;?>/farmer/changePassword/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="fname" class="p-regular-grey">Current Password :</label>
                                <input type="password" id="current_password" name="current_password" class="form-default">
                                <label for="fname" class="p-regular-grey">New Password :</label>
                                <input type="password" id="new_password" name="new_password" class="form-default">
                                <label for="fname" class="p-regular-grey">Confirm Password :</label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-password-error"><?php echo $data['new_password_err']; ?></div> -->
                            </form>
                        </div>

                        
                        
                    </div>
                </div>

            </div>



</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

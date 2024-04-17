<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>farmer/view_profile.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">
    <script src="<?php echo JS;?>farmer/update_profile.js"></script>


    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        .profile-info {
    display: flex;
    align-items: center; /* Align items vertically */
    margin-bottom: 20px; /* Adjust spacing between profile image/heading and update button */
}

.profile-image {
    flex: 0 0 auto; /* Don't allow the image to grow or shrink */
    margin: 20px; /* Adjust spacing between image and heading */
    padding:30px;
}

.profile-image img {
    width: 300px; /* Adjust the width of the profile image */
    height: 300px; /* Maintain aspect ratio */
    padding:30px;
}

.profile-heading {
    flex: 1; /* Allow the heading to grow to fill remaining space */
}

.form-button {
    color: white;
    width: 80%;
    height: 45px;
    border: 0 solid #65A534;
    background:#65A534;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    margin: 20px 10px;
}


        
    </style>
</head>

<body>
<div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">
        <a href="#" id="backButton" onclick="goBack()">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>




                    <div class="navbar-icon-container" data-text="View Profile" >
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon" style="background: #65A534; transform: scale(1.08);">
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">
        <a href="<?php echo URLROOT; ?>/ccm/logout">
            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a></div>

    </div>
    <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
   
</div>
<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
</script>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    
                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" data-text="Your Products">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" data-text="View Their Purchaseorders and Your Salesorders" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" data-text="View Current Market Demands and Prices" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" data-text="View Your Transport requests">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" data-text="View Your Payment Requests">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" data-text="View Your Inquiries">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Help</h6>
                        </div>
                    </a>

                    
                </div>
            </div>
        </section>
    </div>

    <!-- Main content -->
    <div class="main-content">

    <a href="<?php echo URLROOT; ?>/farmer/view_profile" style="text-decoration: none;background: #65A534; transform: scale(1.08);">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp; View Profile</h5>
            </a>

   
           

<section class="header"></section>
<section class="form">
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
                            <p>Change Name</p>
                            <form action="<?php echo URLROOT;?>/farmer/updateName/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="nnamec" class="p-regular-grey">New Name :</label>
                                <input type="text" id="new_name" name="new_name" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-name-error"><?php echo $data['new_name_err']; ?></div> -->
                            </form>
                        </div>
                        <div class="rectangle">
                            <p>Change Email</p>
                            <form action="<?php echo URLROOT;?>/farmer/updateEmail/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="nemail" class="p-regular-grey">New E-mail :</label>
                                <input type="text" id="new_email" name="new_email" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-email-error"><?php echo $data['new_email_err']; ?></div> -->
                            </form>
                        </div>
                        <div class="rectangle">
                            <p>Change Mobile</p>
                            <form action="<?php echo URLROOT;?>/farmer/updateMobile/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                <label for="nmobile" class="p-regular-grey">New Mobile :</label>
                                <input type="text" id="new_mobile" name="new_mobile" class="form-default">
                                <button class="button-main" type="submit">Change</button>
                                <!-- <div class="error" id="new-mobile-error"><?php echo $data['new_mobile_err']; ?></div> -->
                            </form>
                        </div>
                        

                        

                        <div class="rectangle">
                            <p>Change Password</p>
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



</section>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

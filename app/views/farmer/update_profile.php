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

form {
    background-color: rgba(148, 144, 144, 0.333);
            backdrop-filter: blur(57px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius:700px;
            text-align:center;
            padding:10px; 
}

input{color:black;
     padding:10px;
     border-radius:30px;
}

label{color:white;
    font-weight:bold;
    
}

.rectangle{
    padding:20px;
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
        <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>


      


                    <div class="navbar-icon-container" data-text="View Profile" >
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon" style="background: #65A534; transform: scale(1.08);">
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/farmer/logout">

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

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
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

    <a href="<?php echo URLROOT; ?>/farmer/view_profile" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp; View Profile</h5>
            </a>

            <a href="<?php echo URLROOT; ?>/farmer/update_profile" style="text-decoration: none;background: #65A534; transform: scale(1.08);">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp; Update Profile</h5>
            </a>

   
           

<section class="header"> <h2 class="p-regular-grey" style="text-align:center;"></br>Manage Your Account Details</h2></section></br>
<section class="form">
<div class="card-white" style="text-align: center;">
    <div class="subgrid-4" style="display: inline-block;">

        <div class="rectangle" style="margin: auto;">
            
            <table style="margin: auto; text-align: left;">
                <tr>
                    <td class="p-regular-grey" style="padding-right: 10px;">Username</td>
                    <td class="p-regular-grey">:</td>
                    <td class="p-title"><?php echo $_SESSION['user_username'];?></td>
                </tr>
                <tr>
                    <td class="p-regular-grey" style="padding-right: 10px;">Name</td>
                    <td class="p-regular-grey">:</td>
                    <td class="p-title"><?php echo $_SESSION['user_name'];?></td>
                </tr>
                <tr>
                    <td class="p-regular-grey" style="padding-right: 10px;">E-mail</td>
                    <td class="p-regular-grey">:</td>
                    <td class="p-title"><?php echo $_SESSION['user_email'];?></td>
                </tr>
                <tr>
                    <td class="p-regular-grey" style="padding-right: 10px;">Mobile</td>
                    <td class="p-regular-grey">:</td>
                    <td class="p-title"><?php echo $_SESSION['user_mobile'];?></td>
                </tr>
                <tr>
                    <td class="p-regular-grey" style="padding-right: 10px;">NIC</td>
                    <td class="p-regular-grey">:</td>
                    <td class="p-title"><?php echo $_SESSION['user_nic'];?></td>
                </tr>
            </table>
        </div> 
    </div>
    <?php echo '<p>' . flash('user_message') . '</p>';?>
</div>



                        </br>
                        <div class="rectangle" >
                            <form  action="<?php echo URLROOT; ?>/farmer/updateUsername/<?php echo $_SESSION['user_id']; ?>" method="POST" class="subgrid-1">
                            </br><h2>Change Username</br></br></h2> 

                               <div>                                
                                <label for="nusername" class="p-regular-grey" style="color:white;">New Username :</label>
                                <input type="text" id="new_username" name="new_username" >
                                <button class="button-main" type="submit">Change</br></button></div>
                                </br> </br><!-- <div class="error" id="new-username-error"><?php echo $data['new_username_err']; ?></div> -->
                                 </form></br>
                        </div>
                        <div class="rectangle">
                            <form action="<?php echo URLROOT;?>/farmer/updateName/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                            </br><h2>Change Name</br></br></h2>

                            <label for="nnamec" class="p-regular-grey">New Name :</label>
                                <input type="text" id="new_name" name="new_name" class="form-default">
                                <button class="button-main" type="submit">Change</br></button>
                                <!-- <div class="error" id="new-name-error"><?php echo $data['new_name_err']; ?></div> -->
                                </br></br></form></br>
                        </div>
                        <div class="rectangle">
                            <form action="<?php echo URLROOT;?>/farmer/updateEmail/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                            </br><h2>Change Email</br></br></h2>
                               <label for="nemail" class="p-regular-grey">New E-mail :</label>
                                <input type="text" id="new_email" name="new_email" class="form-default">
                                <button class="button-main" type="submit">Change</br></button>
                                <!-- <div class="error" id="new-email-error"><?php echo $data['new_email_err']; ?></div> -->
                                </br></br></form></br>
                        </div>
                        <div class="rectangle">
                            <form action="<?php echo URLROOT;?>/farmer/updateMobile/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                            </br><h2>Change Mobile</br></br></h2>   
                                <label for="nmobile" class="p-regular-grey">New Mobile :</label>
                                <input type="text" id="new_mobile" name="new_mobile" class="form-default">
                                <button class="button-main" type="submit">Change</br></button>
                                <!-- <div class="error" id="new-mobile-error"><?php echo $data['new_mobile_err']; ?></div> -->
                                </br> </br></form></br>
                        </div>
                        

                        

                        <div class="rectangle">
                            <form action="<?php echo URLROOT;?>/farmer/updatePassword/<?php echo $_SESSION['user_id'];?>" method="POST" class="subgrid-1">
                                
                            </br><h2>Change Password</br></br></h2>
                          <label for="fname" class="p-regular-grey">Current Password :</label>
                                <input type="password" id="current_password" name="current_password" class="form-default">
                                <label for="fname" class="p-regular-grey">New Password :</label>
                                <input type="password" id="new_password" name="new_password" class="form-default">
                                <label for="fname" class="p-regular-grey">Confirm Password :</label>
                                <input type="password" id="confirm_new_password" name="confirm_password" placeholder="" class="form-default">
                                <button class="button-main" type="submit">Change</br></button>
                                <br>
                                <div class="error" id="new_password_err"><?php echo $data['new_password_err']; ?></div>
                            </form>
                        </div>

                        
                        
                    </div>
                </section>

            </div>



</section>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

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
        backdrop-filter: blur(20px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: 40px;
        text-align: center;
        padding: 10px;
    }

    input {
        color: black;
        padding: 10px;
        border-radius: 20px;
        border: none;
        margin-left: 10px;
        width: calc(50% - 30px);
        /* Adjusted width */
        text-align: left;
    }

    label {
        color: white;
        font-weight: bold;
        width: 20%;
        margin-left: 20px;
        float: left;
        clear: left;
        padding-left: 10px;
        /* Add left padding to labels */
    }





    .button-main {
        background-color: #65A534;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        border: none;
        cursor: pointer;
        margin: 10px;
        transition: background-color 0.3s ease;
        /* Add transition for smooth effect */
    }

    .button-main:hover {
        background-color: #65A534;
        /* Change background color on hover */
    }



    .prectangle {
        padding: 5px;
        width: 70%;
        /* Adjust the width as needed */
        margin: 0 auto;
        /* Center-align the rectangle */
    }

    .link {
        font-color: black;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-icons">
            <div class="navbar-icon-container" data-text="Go Back">
                <a href="#" id="backButton" onclick="goBack()">
                    <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
                </a>
            </div>


            <div class="navbar-icon-container" data-text="Notifications">
                <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton"
                    onclick="toggleNotifications()">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications"
                        class="navbar-icon">
                </a>
            </div>





            <div class="navbar-icon-container" data-text="View Profile">
                <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout"
                        class="navbar-icon" style="background: #65A534; transform: scale(1.08);">
                </a>
            </div>


            <div class="navbar-icon-container" data-text="Logout">

                <a href="<?php echo URLROOT; ?>/farmer/logout">

                    <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
                </a>
            </div>

        </div>
        <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">

    </div>
    <script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }


    function handleFormSubmission() {

        return false;
    }

    //username error
    document.addEventListener('DOMContentLoaded', function() {
        var usernameInput = document.getElementById('username');
        var usernameError = document.getElementById('new_username_error');

        if (usernameInput) {
            usernameInput.addEventListener('focus', function() {
                if (usernameError) {
                    usernameError.style.display = 'none';
                }
            });
        }
    });

    //email error
    document.addEventListener('DOMContentLoaded', function() {
        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('new_email_error');

        if (emailInput) {
            emailInput.addEventListener('focus', function() {
                if (emailError) {
                    emailError.style.display = 'none';
                }
            });
        }
    });
    </script>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">

                    <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" data-text="Your Products">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" data-text="View Their Purchaseorders and Your Salesorders">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" data-text="View Current Market Demands and Prices">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" data-text="View Your Transport requests">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment"
                        style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" data-text="View Your Payment Requests">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>


                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" data-text="View Your Inquiries">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt=""
                                style="width: 50px; height: 50px;">
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
            <h5 class="inline-heading" class="tab-heading tab-selected">&nbsp;&nbsp;&nbsp; View Profile</h5>
        </a>

        <a href="<?php echo URLROOT; ?>/farmer/update_profile"
            style="text-decoration: none;background: #65A534; transform: scale(1.08);">
            <h5 class="inline-heading" class="tab-heading tab-selected">&nbsp;&nbsp;&nbsp; Update Profile</h5>
        </a>


        <section class="form">




            </br>
            <div class="prectangle">
                <form action="<?php echo URLROOT; ?>/farmer/updateProfile/<?php echo $_SESSION['user_id']; ?>"
                    method="POST" class="subgrid-1">
                    <h2>Update Profile</h2>

                    <?php flash('user_message'); ?>
                    <br>

                    <!-- Username -->
                    <label for="new_username" class="p-regular-grey">New Username:</label>
                    <input type="text" id="new_username" name="new_username"
                        value="<?php echo $_SESSION['user_username']; ?>" required>
                    <div class="error" id="new_username_error"><?php echo $data['new_username_err']; ?></div>
                    <br>

                    <!-- Name -->
                    <label for="new_name" class="p-regular-grey">New Name:</label>
                    <input type="text" id="new_name" name="new_name" value="<?php echo $_SESSION['user_name']; ?>"
                        required>
                    <div class="error" id="new_name_error"><?php echo $data['new_name_err']; ?></div>
                    <br>

                    <!-- Email -->
                    <label for="new_email" class="p-regular-grey">New E-mail:</label>
                    <input type="text" id="new_email" name="new_email" value="<?php echo $_SESSION['user_email']; ?>"
                        required>
                    <div class="error" id="new_email_error"><?php echo $data['new_email_err']; ?></div>
                    <br>

                    <!-- Mobile -->
                    <label for="new_mobile" class="p-regular-grey">New Mobile:</label>
                    <input type="text" id="new_mobile" name="new_mobile" value="<?php echo $_SESSION['user_mobile']; ?>"
                        required>
                    <div class="error" id="new_mobile_error"><?php echo $data['new_mobile_err']; ?></div>
                    <br>



                    <button class="button-main" type="submit">Update Profile</button>
                </form>
            </div>

            <div class="prectangle">
                <form action="<?php echo URLROOT;?>/farmer/updatePassword/<?php echo $_SESSION['user_id'];?>"
                    method="POST" class="subgrid-1">
                    <h2>Change Password</h2>
                    <?php flash('password'); ?>
                    <br>
                    <label for="current_password" class="p-regular-grey">Current Password :</label>
                    <input type="password" id="current_password" name="current_password" class="" required>
                    <!-- <div class="error" id="current_password_err"><?php echo $data['current_password_err']; ?></div> -->

                    <br><br>
                    <label for="new_password" class="p-regular-grey">New Password :</label>
                    <input type="password" id="new_password" name="new_password" class="" required>
                    <!-- <div class="error" id="new_password_err"><?php echo $data['new_password_err']; ?></div> -->

                    <br><br>
                    <label for="confirm_password" class="p-regular-grey">Confirm Password :</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="" required>
                    <!-- <div class="error" id="confirm_new_password_err"><?php echo $data['confirm_new_password_err']; ?></div> -->

                    <br>
                    <button class="button-main" type="submit">Change</button>
                </form>
            </div>




        </section>

    </div>



    </section>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>farmer/view_profile.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/farmer/view_profile.css">


    <style>
    body,
    html {
        background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
        background-size: cover;
        height: 100%;
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
    }

    .button-main:hover {
        background-color: #65A534;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-icons">
            <div class="navbar-icon-container" data-text="Go Back">
                <a href="<?php echo URLROOT; ?>/farmer/dashboard">
                    <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
                </a>
            </div>


            <div class="navbar-icon-container" data-text="Notifications">
                <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton"
                    onclick="toggleNotifications()">
                    <div class="redcircle"></div>
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

        <a href="<?php echo URLROOT; ?>/farmer/view_profile"
            style="text-decoration: none;background: #65A534; transform: scale(1.08);">
            <h5 class="inline-heading" class="tab-heading tab-selected">&nbsp;&nbsp;&nbsp;View Profile</h5>
        </a>




        <section class="form">
            <div class="center">
                <div class="profile-info">
                    <div class="profile-image">
                        <?php if (!empty($_SESSION['profile_image'])) : ?>
                        <img id="profile-image"
                            src="<?php echo URLROOT . '/images/uploads/' . $_SESSION['profile_image']; ?>"
                            alt="Profile Picture">
                        <?php else : ?>
                        <img id="profile-image" src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png"
                            alt="Default Profile Picture">
                        <?php endif; ?>

                        <div class="flash-message-error">
                            <?php echo flash('profile_pic_error'); ?>
                        </div>
                        <form action="<?php echo URLROOT; ?>/farmer/updateProfilePic" method="POST"
                            enctype="multipart/form-data" onchange="loadFile(event)">
                            <input type="file" name="profile_image" id="profile-picture-input" accept="image/*"
                                style="display: none;" onchange="this.form.submit()">
                            <button class="button-main" type="button" onclick="chooseProfilePicture()">Upload Profile
                                Picture</button>
                        </form>
                    </div>
                </div>

                <script>
                function chooseProfilePicture() {
                    document.getElementById('profile-picture-input').click();
                }

                var loadFile = function(event) {
                    var image = document.getElementById("profile-image");
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>



                <div class="profile-heading">
                    <?php echo '<h3>Hello, ' . $data['name'] . '&nbsp;!</h3>'; ?></br>

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
                                    <tr>
                                        <td class="p-regular-grey" style="padding-right: 10px;">Home</td>
                                        <td class="p-regular-grey">:</td>
                                        <td class="p-title"><?php echo $_SESSION['user_home'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <button class="button-main" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo URLROOT; ?>/farmer/update_profile'">Update your
                        Profile</button>


                </div>
            </div>

            <script>
            function updateNotifications() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '<?php echo URLROOT; ?>/farmer/notify', true);

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Parse response as JSON
                        var response = JSON.parse(xhr.responseText);

                        // Get the red circle element
                        var redCircle = document.querySelector('.redcircle');

                        // Update red circle based on unread notifications
                        if (response.unread) {
                            redCircle.style.display = 'block'; // Show red circle
                        } else {
                            redCircle.style.display = 'none'; // Hide red circle
                        }
                    }
                };

                xhr.send();
            }

            // Call the function initially
            updateNotifications();
            setInterval(updateNotifications, 5000);
            </script>
            <!-- Update profile button -->
    </div>

    </div>
    </section>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
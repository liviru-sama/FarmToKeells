<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">
    <script src="<?= JS ?>place_order.js"></script>

    <style>
    body,
    html {
        /* Add your background image URL and properties here */
        background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
        background-size: cover;
        height: 100%;
    }

    #notificationFrame,
    #productSelectionFrame {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        z-index: 9999;
        display: none;
        /* Initially hide the iframe */
        width: 80%;
        /* Adjust width as needed */
        height: 80%;
        /* Adjust height as needed */
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
                        class="navbar-icon">
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
    </script>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/view_price"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/transport"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/view_payment"
                        style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/inquiry"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
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
        <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="text-decoration: none;">
            <h5 class="inline-heading tab-heading tab-selected"
                style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">
                &nbsp;&nbsp;&nbsp;Keells' purchaseorders</h5>
        </a>
        <a href="<?php echo URLROOT; ?>/farmer/add_salesorder" style="text-decoration: none;">
            <h5 class="inline-heading tab-heading tab-selected"
                style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">
                &nbsp;&nbsp;&nbsp;Add Order</h5>
        </a>
        <br>

        <section class="header"></section>
        <section class="form">
            <div class="center">
                <h1>Request Transport</h1>
                <form action="<?= URLROOT ?>/farmer/place_order" method="post">
                    <!-- Hidden input fields to store order ID and user ID -->
                    <input type="hidden" name="order_id"
                        value="<?= isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : ''; ?>">
                    <input type="hidden" name="user_id"
                        value="<?= isset($_GET['user_id']) ? htmlspecialchars($_GET['user_id']) : ''; ?>">

                    <!-- Non-editable but visible fields -->
                    <div class="text-field">
                        <input type="text" name="product_name" id="product_name"
                            value="<?= isset($_GET['product_name']) ? htmlspecialchars($_GET['product_name']) : ''; ?>"
                            readonly>
                        <span></span>
                        <label>Product</label>
                    </div>


                    <div class="error" id="product-error"><?= $data['errors']['product_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="quantity" id="quantity"
                            value="<?= isset($_GET['quantity']) ? htmlspecialchars($_GET['quantity']) : ''; ?>"
                            readonly>
                        <span></span>
                        <label>Quantity( in kg)</label>
                    </div>
                    <div class="error" id="quantity-error"><?= $data['errors']['quantity_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="address" id="address"
                            value="<?= isset($_GET['address']) ? htmlspecialchars($_GET['address']) : ''; ?>" readonly>
                        <span></span>
                        <label>Collection Address</label>
                    </div>

                    <!-- Other form fields -->
                    <div class="text-field">
                        <input type="date" name="startdate" id="startdate" required>
                        <span></span>
                        <label>Earliest Pick-Up Date</label>
                    </div>
                    <div class="error" id="startdate-error"><?php echo $data['errors']['startdate_err']; ?></div>

                    <div class="text-field">
                        <input type="date" name="enddate" id="enddate" required>
                        <span></span>
                        <label>Latest Pick-Up Date</label>
                    </div>
                    <div class="error" id="enddate-error"><?php echo $data['errors']['enddate_err']; ?></div>

                    <div class="text-field unrequired">
                        <input type="text" name="notes" id="notes" placeholder="Special instructions or requirements">
                        <span></span>
                        <label>Additional Notes</label>
                    </div>

                    <input type="submit" value="Place Request">
                </form>
            </div>
        </section>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
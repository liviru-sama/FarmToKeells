<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

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




    /* Style for the list */
    ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        text-align: center;
        /* Center the list items */
        list-style: none;
        /* Remove default list styles */
        padding: 0;
        /* Remove default padding */
        margin: 0;
        /* Remove default margin */
    }

    li {
        text-align: left;
        /* Align list item content to the left */
        margin-bottom: 20px;
        /* Add some space between list items */
    }

    strong {
        display: inline-block;
        width: 200px;
        /* Adjust the width as needed */
        font-weight: bold;
        text-align: right;
        /* Align labels to the right */
        padding-right: 10px;
        /* Add space between label and value */
    }

    span {
        display: inline-block;
        text-align: left;
        /* Align values to the left */
    }

    h1 {
        text-align: center;
        /* Center the heading */
        margin-top: 20px;
        /* Add some margin from the top */
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
        <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
        <div class="redcircle"></div>
<img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>





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
                        <div class="menu" data-name="p-2">
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
                        <div class="menu" data-name="p-5" style="background: #65A534; transform: scale(1.08);">
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

        <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="text-decoration: none;">
            <h5 class="inline-heading">&nbsp;&nbsp;&nbsp;View Your Payment Details</h5>
        </a>
        <a href="<?php echo URLROOT; ?>/farmer/paymentrequests" style="text-decoration: none;">
            <h5 class="inline-heading "
                style="background: #65A534; transform: scale(1.08); border-radius: 10px; padding: 10px;">
                &nbsp;&nbsp;&nbsp;View Order Payments</h5>
        </a>
        <section class="header">
            <main class="table" style="text-align:center;"></br>

            <?php if (!empty($data['paymentRequests'])) : ?>
    <h2>Your Pending Payments</h2></br>
    <table>
        <thead>
            <tr>
                <th>Your Payment ID</th>
                <th>Your Order ID</th>
                <th>Product</th>
                <th>Total Price</th>
               
                <th>Status</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['paymentRequests'] as $paymentRequest) : ?>
                <?php if ($paymentRequest->status === 'pending') : ?>
                    <?php $pendingFound = true; ?>
                    <tr>
                        <!-- Display pending payment requests -->
                        <td><?php echo $paymentRequest->payment_id; ?></td>
                        <!-- Other table cells -->
                        <td><?php echo $paymentRequest->order_id; ?></td>
                        <td><?php echo $paymentRequest->product; ?></td>
                        <td><?php echo $paymentRequest->totalprice; ?></td>
                        
                        <td><?php echo $paymentRequest->status; ?></td>
                       
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!$pendingFound) : ?>
    <p>No pending payment requests found.</p>
<?php endif; ?>

                </br> </br> 
    <h2>Your Completed Payments</h2></br>
    <table>
        <thead>
            <tr>
                <th>Your Payment ID</th>
                <th>Your Order ID</th>
                <th>Product</th>
                <th>Total Price</th>
                
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['paymentRequests'] as $paymentRequest) : ?>
                <?php if ($paymentRequest->status !== 'pending') : ?>
                    <?php $completedFound = true; ?>
                    <tr>
                        <!-- Display completed payment requests -->
                        <td><?php echo $paymentRequest->payment_id; ?></td>
                        <!-- Other table cells -->
                        <td><?php echo $paymentRequest->order_id; ?></td>
                        <td><?php echo $paymentRequest->product; ?></td>
                        <td><?php echo $paymentRequest->totalprice; ?></td>
                        
                        <td><?php echo $paymentRequest->status; ?></td>
                       
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else : ?>
    <p>No payment requests found.</p>
<?php endif; ?>

    
                

    <script>function updateNotifications() {
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

<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>


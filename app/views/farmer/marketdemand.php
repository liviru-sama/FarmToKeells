<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>/ccm/updatecircle.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        .bar-container {
            top: 18%;
            left: 0%;
            display: flex;
            align-items: flex-end;
            height: 400px; /* Adjust height as needed */
            position: relative;
        }

        .bar {
            background-color: #65A534;
            margin: 0 20px; /* Adjust margin as needed */
            border-radius: 5px;
            text-align: center;
            color: #fff;
            font-size: 18px;
            padding: 10px;
            position: relative;
            width: 150px;
            backdrop-filter: blur(19px);
            box-shadow: 0 .9rem .8rem #0005;
        }

        .bar-name {
            margin-top: 5px;
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-weight: bold;
            font-size: 15px;
        }

        .bar::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #000;
        }

        .bar-graph {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            color: #000;
        }

        .bar-percentage {
            color: white;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-weight: bold;
            font-size: 25px;
        }

        .axis-line {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .x-axis-line {
            bottom: 10;
            border-bottom: 5px solid #000;
            left: -1%;
        }

        .y-axis-line {
            left: -1%;
            border-left: 7px solid #000;
        }

        .axis-label {
            color: #fff;
            font-weight: bold;
            position: absolute;
        }

        .x-axis-label {
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
        }

        .y-axis-label {
            top: 50%;
            left: -3%; /* Adjust the distance from the vertical line */
            transform: translateY(-50%) rotate(-90deg);
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
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon" >
                    </a></div>\
          
          
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
                        <div class="menu" data-name="p-4" data-text="View Current Market Demands and Prices" style="background: #65A534; transform: scale(1.08);">
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

                    <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
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
        <a href="<?php echo URLROOT; ?>/farmer/view_price" style="text-decoration: none;">
            <h5 class="inline-heading" class="tab-heading tab-selected">&nbsp;&nbsp;&nbsp; PRODUCT PRICES</h5>
        </a>

        <a href="<?php echo URLROOT; ?>/farmer/marketdemand" style="text-decoration: none;">
            <h5 class="inline-heading" class="tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp; MARKET DEMAND </h5>
        </a>

        <br><br>

        <main class="stock">

            <br><br>

            <h2 class="inline-heading" style="text-align: center; color: black;">CURRENT MARKET DEMAND OF PRODUCTS</h2>

            <br><br>

            <div class="bar-container">
            <?php
    // New code: Accessing product data passed from the controller through $data array
    $prices = $data['prices'];

    // Find the product with the maximum price
    $maxPrice = 0;
    foreach ($prices as $price) {
        if ($price['price'] > $maxPrice) {
            $maxPrice = $price['price'];
        }
    }

    // Check if $maxPrice is greater than zero
    if ($maxPrice > 0) {
        // Iterate through each product to generate bars
        foreach ($prices as $price) {
            // Calculate the height of the bar based on the percentage of (price / maxPrice)
            $demandPercentage = ($price['price'] / $maxPrice) * 100;

            // Check if the calculated percentage is negative and set it to 0 if true
            if ($demandPercentage < 0) {
                $demandPercentage = 0;
            }
            ?>
            <div class="bar" style="height: <?php echo $demandPercentage; ?>%;">
                <div class="bar-name" style="bottom: -35px;"><?php echo $price['name']; ?></div>
                <div class="bar-graph">
                    <span class="bar-percentage" style="font-weight:bold; font-size: 25px;"><?php echo round($demandPercentage); ?>%</span>
                </div>
            </div>
    <?php
        }
    } else {
        // Handle the case where $maxPrice is zero
        echo "Error: Maximum price is zero.";
    }
?>

                <div class="axis-line x-axis-line"></div>
                <div class="axis-line y-axis-line"></div>
                <div class="axis-label y-axis-label">Market Demand</div>
            </div>

        </main>
    </div>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

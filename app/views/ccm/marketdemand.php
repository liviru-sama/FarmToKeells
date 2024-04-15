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
            top:18%;
            left:0%;
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
            color:white;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
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
        <a href="#" id="backButton" onclick="goBack()">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a>
        <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a>
        <a href="<?php echo URLROOT; ?>/ccm/logout">
            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a>
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
                <a href="<?php echo URLROOT; ?>/ccm/view_inventory" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inventory</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" >
                            <img src="<?php echo URLROOT; ?>/public/images/report.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Time Report</h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/ccm/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inquiry</h6>
                        </div>
                    </a>

                    
                </div>
            </div>
        </section>
    </div>

    <!-- Main content -->
    <div class="main-content">

    <a href="<?php echo URLROOT; ?>/ccm/view_price" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp; PRODUCT PRICES</h5>
            </a>

    <a href="<?php echo URLROOT; ?>/ccm/marketdemand" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp; MARKET DEMAND </h5></a>

    
           
</br>

    <main class="stock">

</br>

<h2 class="inline-heading" style="text-align: center;color:black; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CURRENT MARKET DEMAND OF PRODUCTS </h2>

</br>
</br>
<div class="bar-container">
    <?php
    // New code: Accessing product data passed from the controller through $data array
    $prices = $data['prices'];

    // Find the product with the maximum quantity
    $maxQuantity = 0;
    foreach ($prices as $price) {
        if ($price['price'] > $maxQuantity) {
            $maxQuantity = $price['price'];
        }
    }

    // Check if $maxQuantity is greater than zero
    if ($maxQuantity > 0) {
        // Iterate through each product to generate bars
        foreach ($prices as $price) {
            // Calculate the height of the bar based on the percentage of (100 - quantity)
            $barHeight = (( $price['price']) / 500) * 100; // Percentage that 100 - quantity

            // Check if the calculated percentage is negative and set it to 0 if true
            if ($barHeight < 0) {
                $barHeight = 0;
            }
            ?>
            <div class="bar" style="height: <?php echo $barHeight; ?>%;">
                <div class="bar-name" style="bottom: -35px;"><?php echo $price['name']; ?></div>
                <div class="bar-graph">
                <span class="bar-percentage" style="font-weight:bold; font-size: 25px;"><?php echo round($barHeight); ?>%</span>

                </div>
            </div>
    <?php
        }
    } else {
        // Handle the case where $maxQuantity is zero
        echo "Error: Maximum quantity is zero.";
    }
    ?>
    <div class="axis-line x-axis-line"></div>
    <div class="axis-line y-axis-line"></div>
    <div class="axis-label y-axis-label">Market Demand</div>
</div>

    </div>
    </main>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

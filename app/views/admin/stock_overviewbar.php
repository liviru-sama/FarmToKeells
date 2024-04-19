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
            left:5%;
            display: flex;
            align-items: flex-end;
            height: 400px; /* Adjust height as needed */
            position: relative;
        }

        .bar {
    background-color: #65A534;
    margin: 0 5px; /* Adjust margin as needed */
    border-radius: 5px;
    text-align: center;
    color: #fff;
    font-size: 18px;
    padding: 5px;
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
            font-size: 25px;

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
            width: 80%;
            height: 100%;
            
        }

        .x-axis-line {
            bottom: 10;
            border-bottom: 5px solid #000;
        
        }

        .y-axis-line {
            left: 0;
            border-left: 5px solid #000;
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
    left: -8%; /* Adjust the distance from the vertical line */
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

<a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()" >
    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
</a></div>

<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/admin/logout">
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
                   
                    <a href="<?php echo URLROOT; ?>/admin/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                  
                    
                    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" style="background: #65A534; transform: scale(1.08);" >
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div></a>

                   
                    <a href="<?php echo URLROOT; ?>/admin/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/admin/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>
    


                        <a href="<?php echo URLROOT; ?>/admin/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Reply</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/admin/manageUsers" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Users</h6>
                        </div>
                    </a>


                </div>
            </div>
        </section>
    </div>

   

    <div class="main-content">
    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">STOCK LEVELS</h5></a>

  

          
                <a href="<?php echo URLROOT; ?>/admin/displayReportGenerator" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;GENERATE QUANTITY-TIME CHART </h5></a>

    <a href="<?php echo URLROOT; ?>/admin/displayReportGeneratorprice" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >GENERATE PRICE-TIME CHART</h5>
            </a>
            <a href="<?php echo URLROOT; ?>/admin/view_price" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected"  >&nbsp;&nbsp;&nbsp; PRODUCT PRICES</h5>
            </a>

    <a href="<?php echo URLROOT; ?>/admin/marketdemand" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading">MARKET DEMAND </h5></a>

            </br>  <main class="table">
</br>

<a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;BAR CHART VIEW </h5></a>

    <a href="<?php echo URLROOT; ?>/admin/stock_overview" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >CIRCULAR PROGRESS BAR VIEW</h5>
            </a>
</br>

    <main class="stock" style="text-align: center;">
    

<h2 class="inline-heading" style="text-align: center;color:black; ">Current Inventory Levels at Warehouse</h2>

</br>
</br></br>
</br>
<div class="bar-container">
    <?php
    // New code: Accessing product data passed from the controller through $data array
    $products = $data['products'];

    // Find the product with the maximum quantity (assuming it's already in 100kgs)
    $maxQuantity = 100; // Assuming the maximum quantity is 100kgs
    if ($maxQuantity > 0) {
        // Iterate through each product to generate bars
        foreach ($products as $product) {
            // Calculate the height of the bar based on the percentage of the maximum quantity (100kgs)
            $barHeight = ($product['quantity'] / $maxQuantity) * 100;
            ?>
            <div class="bar" style="height: <?php echo $barHeight; ?>%;">
                <div class="bar-name"><?php echo $product['name']; ?></div>
                <div class="bar-graph">
                    <span class="bar-percentage" style="font-weight:bold; font-size: 25px;"><?php echo round($barHeight); ?>kgs</span>
                </div>
            </div>
    <?php
        }
    } else {
        // Handle the case where $maxQuantity is zero or negative
        echo "Error: Maximum quantity is zero or negative.";
    }
    ?>
    <div class="axis-line x-axis-line"></div>
    <div class="axis-line y-axis-line"></div>
    <div class="axis-label y-axis-label">Quantity in kgs</div>
</div>

    </div>
    </main>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

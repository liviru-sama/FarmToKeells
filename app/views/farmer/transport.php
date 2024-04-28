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




.table_header {
    display: flex;
    justify-content: space-between; /* Align items to both ends */
    align-items: center; /* Vertically center items */
}

.inline-heading {
    margin: 0; /* Remove default margin */
}

#searchInput {
    padding: 10px 20px;
    background-color: #65A534;
    color: white;
    border: 2px solid #4CAF50;
    border-radius: 5px;
    margin-right: 10px; /* Adjust margin-right as needed */
    width:300px;
}

.button {
    padding: 10px 20px;
    background-color: #65A534;
    color: white;
    border: 2px solid #4CAF50;
    border-radius: 5px;
    text-decoration: none; /* Remove default underline */
}


        #notificationFrame {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff5;
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
            z-index: 9999;
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }

        .disabled-link {
            pointer-events: none;
            opacity: 0.5;
            filter: grayscale(100%);
        }

    </style>
</head>

<body>
<div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">
        <a href="<?php echo URLROOT; ?>/farmer/dashboard" id="backButton" >
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>


      


                    <div class="navbar-icon-container" data-text="View Profile" >
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon" >
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/farmer/logout">

            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a></div>

    </div>
    <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
   
</div>


    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    
                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2"  > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4"  >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" >
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" >
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
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

    <div class="main-content">

        <main class="table"></br>
            <section class="table_body">
            <h2>Transport Orders</h2>
            <table>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <?php foreach($data['transports'] as $transport) {
                    echo "<tr>
                        <td style='font-weight: 300; padding: 0.8rem 0;'>".$transport->order_id."</td>
                        <td style='font-weight: 300; padding: 0.8rem 0;'>".$transport->product_name."</td>
                        <td style='font-weight: 300; padding: 0.8rem 0;'>".$transport->quantity."</td>
                        <td style='font-weight: 300; padding: 0.8rem 0;'>".$transport->date."</td>
                        <td style='font-weight: 300; padding: 0.8rem 0;'>".$transport->status."</td>
                    </tr>";
                } ?>
            </table>
            </section>
        </main>
</body>


</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
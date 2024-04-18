


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <script src="<?php echo JS;?>add_product.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        
    /* Existing CSS styles */
    /* ... */

    /* Error message style */
    .error-message {
        color: red;
        text-align: center;
        margin-top: 20px; /* Adjust margin top as needed */
    }

      
        /* CSS for styling the iframe */
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
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }
    
        .dialog-box {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border: 1px solid #000;
            z-index: 9999;
            display: none; /* Initially hidden */
        }
    
    </style>
</head>

<body>
   <!-- Navbar -->
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
                        <div class="menu" data-name="p-2" style="background: #65A534; transform: scale(1.08);" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                  
                    
                    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
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

    <!-- Main content -->
    <div class="main-content">

    <a href="<?php echo URLROOT; ?>/admin/purchaseorder" style="text-decoration: none;">
    <h5 class="inline-heading" class
=
"tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;VIEW ALL PURCHASE ORDERS</h5>
</a>
<a href="<?php echo URLROOT; ?>/admin/salesorder" style="text-decoration: none;">
<h5 class="inline-heading" class
=
"tab-heading" >&nbsp;VIEW All SALESORDERS</h5></a>
            
        <section class="form">
        <div class="center">
            <h1>Edit Purchase Order</h1>
            <form method="post" action=""> <!-- Added action attribute -->
                <div class="text-field">
                    <input type="text" name="name" value="<?=$data['name']?>" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Product</label>
                </div>
                <div class="text-field">
                    <input type="text" name="type" value="<?=$data['type']?>" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Category</label>
                </div>
                <div class="text-field">
                    <input type="date" name="date" id="purchaseDate" value="<?=$data['date']?>" required> <!-- Added name attribute and id attribute -->
                    <span></span>
                    <label> Date</label>
                </div>
                <div class="text-field">
                    <input type="number" name="quantity" value="<?=$data['quantity']?>" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Stock</label>
                </div>
                <input type="submit" value="Reset" onclick="resetForm()">
                <input type="submit" value="Save">
            </form>
        </div>
    </section>

    <script>
        // JavaScript code to restrict past dates in the date input field
        document.addEventListener('DOMContentLoaded', function() {
            var purchaseDateInput = document.getElementById('purchaseDate');
            var currentDate = new Date().toISOString().split('T')[0];
            purchaseDateInput.setAttribute('min', currentDate);
        });
    </script>
        </body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
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

    <!-- Main content -->
    <div class="main-content">

   

    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;&nbsp;STOCK LEVELS</h5></a>

  

          
  
                <a href="<?php echo URLROOT; ?>/admin/displayReportGenerator" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENERATE QUANTITY-TIME CHART&nbsp;&nbsp;&nbsp;</h5></a>

    <a href="<?php echo URLROOT; ?>/admin/displayReportGeneratorprice" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENERATE PRICE-TIME CHART&nbsp;&nbsp;&nbsp;</h5>
            </a>


    <a href="<?php echo URLROOT; ?>/admin/view_price" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT PRICES</h5>
            </a>

    <a href="<?php echo URLROOT; ?>/admin/marketdemand" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp; MARKET DEMAND </h5></a>
        
            <section class="table_header">


            </section>


            <section class="form">
        <div class="center">
            <h1 style="font-family: 'inter';">Edit price</h1>
            <form method="post" action="<?php echo URLROOT; ?>/admin/edit_price?id=<?=$data['product_id']?>"> 

            <input type="hidden" name="id" value="<?=$data['product_id']?>">

 

                <div class="text-field">
                    <!-- Use a disabled text field to display the product name -->
                    <input type="text" name="name" value="<?=$data['name']?>" disabled> 
                    <span></span>
                    <label> Product</label>
                </div>
                
                <div class="text-field">
    <!-- Make the price field editable -->
    <input type="number" name="price" id="priceInput" value="<?=$data['price']?>" required step="any"> 
    <span></span>
    <label>Price per kg</label>
</div>

               
                <input type="submit" value="Reset" onclick="resetForm()">
                <input type="submit" value="Save">
            </form>
        </div>
    </section></main></main>
<script>
    // Add event listener to the input element
document.getElementById('priceInput').addEventListener('input', function(event) {
    // Get the entered value
    const price = parseFloat(event.target.value);
    
    // Check if the entered value is negative or zero
    if (price <= 0) {
        // If negative or zero, set the value to empty
        event.target.value = '';
    }
});</script>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

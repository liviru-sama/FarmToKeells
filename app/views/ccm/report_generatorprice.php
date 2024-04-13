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
        
        /* CSS for styling the form */
        .form-container {
            width: 50%; /* Set the width to occupy half of the page */
            margin: 0 auto; /* Center the container horizontally */
        }
        .text-field {
            margin-bottom: 10px; /* Add some spacing between input fields */
        }
        input[type="date"] {
            width: calc(100% - 10px); /* Adjust the width of the date inputs */
        }
        input[type="submit"] {
            width: 100%; /* Make the submit button full width */
        }
        .iframe-container {
            margin-top: 20px; /* Add margin to separate the iframe from the form */
        }
        #report_frame {
            width: 100%;
            height: 400px;
            border: none; /* Remove border from iframe */
        }
    
    </style>
</head>

<body>
<div class="navbar">
    <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo" style="left: 0;">
    <div class="navbar-icons">
        
    <a href="#" id="backButton"  onclick="goBack()">
        <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon"> </a>

         <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a>

            <a href="<?php echo URLROOT; ?>/ccm/logout">
    <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
</a>

        <!-- Add more icons as needed -->
    </div>
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
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div></a>

                    <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/report.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Time Report</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
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
        <section class="header">

        <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp; GENERATE QUANTITY-TIME CHART</h5></a>

    <a href="<?php echo URLROOT; ?>/ccm/displayReportGeneratorprice" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">GENERATE PRICE-TIME CHART</h5>
            </a>
           

            </br>  <main class="table">
</br>
<a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" style="background: #65A534; transform: scale(1.08); padding: 2px;">&nbsp;&nbsp;&nbsp; PRICE REPORT FORM</h5></a>

    
 <main class="table">

        
            <section class="table_body">


            
            <section class="form">
        <div class="form-container"></br></br></br>
        
            <h1 style="font-family: 'inter';">Generate Report for a product price over time</br></br></h1>
            <form action="<?php echo URLROOT; ?>/ccm/displayInventoryHistoryReportprice" method="post" >
                <div class="text-field">
                    <label for="start_date">Start Date:</label> 
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="text-field">
                    <label for="end_date">End Date:</label> 
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="text-field">
                    <label for="product_name">Product Name:</label> 
                    <input type="text" id="product_name" name="product_name">
                </div>
                <input type="submit" value="Generate Chart"></br></br>
            </form>
        </div>
    </section></section> </main>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

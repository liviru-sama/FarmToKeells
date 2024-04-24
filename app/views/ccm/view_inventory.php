<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <script src="<?php echo JS;?>ccm/searchproduct.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
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

<a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()" >
    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
</a></div>

<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/ccm/logout">
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
                    <a href="<?php echo URLROOT; ?>/ccm/view_inventory" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" style="background: #65A534; transform: scale(1.08);">
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
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/report.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Time Report</h6>
                        </div>
                    </a>

    


                        <a href="<?php echo URLROOT; ?>/ccm/ccm_chat" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
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
           
           <a href="<?php echo URLROOT; ?>/ccm/view_inventory" style="text-decoration: none;">
       <h5 class="inline-heading" class
   =
   "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;UPDATE INVENTORY</h5>
   </a></br>


   <main class="table"></br>
   <section class="table_header">

        <h2 class="inline-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Inventory levels  </h2>   
       <div> <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Search for products..." style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">

                                 

             <a class="button" class="inline-heading" href="<?php echo URLROOT; ?>/ccm/add_product">+ Add Product</a>
             </div></section>
    </br>    
    
        <main class="table">
            
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name </th>
                                <th>Product Image</th>
                                <th>Product Type</th>
                                <th>Present Quantity In Good Condition </br>   (in kgs) </th>
                                <th>Present Quantity In Bad Condition </br>   (in kgs) </th>

                                <th>Price per kg</th>
                                <th>Last Updated time </th>

                                <th>EDIT</th>
                                
                             </tr>
                        </thead>
                        <tbody>
                     
                            
                                

   
    <?php while ($row = mysqli_fetch_assoc($data['products'] )) { ?>
        <tr>
            <td><?php echo $row['product_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>" alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>" style="width: 50px;"></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['poor_quantity'] ?></td>

            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['time'] ?></td>

            <td><a href="<?php echo URLROOT; ?>/ccm/edit_product?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
           
        </tr>
    <?php } ?>


                        </tbody>
                    </table>
                </form>
            </section><!-- Add this HTML in your parent window where you want the notifications to be displayed -->
<div class="notification-frame" id="notificationFrame">
    <iframe src="<?php echo URLROOT; ?>/ccm/notifications" frameborder="0" class="notifications-iframe" id="notificationsIframe"></iframe>
</div>

        </main>
       
        </body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
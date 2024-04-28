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
        justify-content: space-between;
        /* Align items to both ends */
        align-items: center;
        /* Vertically center items */
    }

    .inline-heading {
        margin: 0;
        /* Remove default margin */
    }

    #searchInput {
        padding: 10px 20px;
        background-color: #65A534;
        color: white;
        border: 2px solid #4CAF50;
        border-radius: 5px;
        margin-right: 10px;
        /* Adjust margin-right as needed */
        width: 300px;
    }

    .button {
        padding: 10px 20px;
        background-color: #65A534;
        color: white;
        border: 2px solid #4CAF50;
        border-radius: 5px;
        text-decoration: none;
        /* Remove default underline */
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


                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry"
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

        <div class="main-content">

            <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="text-decoration: none;">
                <h5 class="inline-heading" class="tab-heading tab-selected"
                    style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">
                    &nbsp;&nbsp;&nbsp;Keells' Needlist</h5>
            </a>





            </br>





            <main class="table"></br>
                <section class="table_header">

                    <h2 class="inline-heading">&nbsp;&nbsp;&nbsp;Place Orders for Keells' Needlist
                        Items&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>

                    <div>
                        <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Search products..."
                            style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">
                    </div>
                </section></br>






        
    
            
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>Needlist ID</th>
                                <th>Product</th>
                                <th>Product image</th>
                                <th>product type</th>
                                <th>needed quantity(kgs)</th>
                                <th>expected supply date</th>
                                <th>Status</th>
                                <th>Place Order</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['purchaseorders'] as $row) { ?>                                <?php if ($row['purchase_status'] === 'Pending') { ?>                                <tr>
                                <tr>
                                    <td><?php echo $row['purchase_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>"
                                            alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>"
                                            style="width: 50px;"></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td>
                                        <!-- Display the status from the database -->
                                        <?php echo $row['purchase_status'] ?>
                                        <!-- Hidden input field to send order_id with the form -->
                                    </td>
                                 
            </main>
                                    <td><a class="button" href="<?php echo URLROOT; ?>/farmer/place_salesorder/<?php echo $row['purchase_id']; ?>?<?php echo $_SESSION['user_id']; ?>"
>
Place Order </a></td>
                                </tr><?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </section>

            <script>
            function searchProducts() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.querySelector("table");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those that don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponds to the product name column
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Show the row if the product name matches the search query
                        } else {
                            tr[i].style.display = "none"; // Hide the row if it doesn't match
                        }
                    }
                }
            }
        

function updateNotifications() {
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
</body>


</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
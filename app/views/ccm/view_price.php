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

    </style>
</head>

<body>
    <!-- Navbar -->
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
                        <div class="menu" data-name="p-1" >
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

    <div class="main-content">

    <a href="<?php echo URLROOT; ?>/ccm/view_price" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp; PRODUCT PRICES</h5>
            </a>

    <a href="<?php echo URLROOT; ?>/ccm/marketdemand" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading">MARKET DEMAND </h5></a>

    
           
</br>


      
        
    
        <main class="table">
            <section class="table_header">
            </br>
            <h2 class="inline-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT PRICES  
        <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Search for products..." style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">

                                 

        </h2>
    </br>    </br>
            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                       
                        <tbody>
                     
                            
                                

   
    <?php while ($row = mysqli_fetch_assoc($data['prices'] )) { ?>

      
    <td class="card">
        <div class="card__content">
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">&nbsp;&nbsp; <span style="color: white; font-weight: bold; font-size: 20px;font-family: 'Verdana', sans-serif;"><?php echo $row['name']; ?></span></p>
            <img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>" alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>" class="card__image">
            <div class="card__details">
                <p class="card__text" style="color: black; font-family: 'Arial', sans-serif;">price per kg:</br>&nbsp;&nbsp;<span style="color: white; font-weight: bold; font-size: 20px; font-family: 'Verdana', sans-serif;"><?php echo $row['price']; ?>/=</span></p>
              
            </div>
        </div>
        <div class="card__actions">
            <a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png" class="card__action"></a>
        </div></br></br>
    
    <?php } ?></td>



                        </tbody>
                    </table>
                </form>
            </section><!-- Add this HTML in your parent window where you want the notifications to be displayed -->


<div class="notification-frame" id="notificationFrame">
    <iframe src="<?php echo URLROOT; ?>/ccm/notifications" frameborder="0" class="notifications-iframe" id="notificationsIframe"></iframe>
</div>

        </main>
        <script>

document.addEventListener('DOMContentLoaded', function() {
    // Get the notification icon
    var notificationsButton = document.getElementById('notificationsButton');
    // Get the notification frame
    var notificationFrame = document.getElementById('notificationFrame');

    // Function to toggle the display of the notification frame
    function toggleNotificationFrame() {
        notificationFrame.style.display = notificationFrame.style.display === 'none' ? 'block' : 'none';
    }

    // Show the notification frame when the notifications icon is clicked
    notificationsButton.addEventListener('click', function(event) {
        // Prevent the default action of the notifications icon
        event.preventDefault();
        // Toggle the display of the notification frame
        toggleNotificationFrame();
    });

    // Hide the notification frame when clicking outside of it
    window.addEventListener('click', function(event) {
        // Check if the click event occurred outside of the notification frame and its trigger element
        if (!notificationFrame.contains(event.target) && event.target !== notificationsButton) {
            // Hide the notification frame
            notificationFrame.style.display = 'none';
        }
    });
});

</script>
        </body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
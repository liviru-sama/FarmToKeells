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

    
    
           
</br>


      
        
    
        <main class="table"> </br>
            <section class="table_header">
           
            <h2 class="inline-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Market Prices</h2> 
        <div>
            <input type="text" id="searchInput" onkeyup="searchcardProducts()" placeholder="Search for products..." style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">
            </div>
                                
            </section> </br>   
            <section class="table_body">
                <form method="post">
                    <table>
                       
                        <tbody>
                     
                            
                                

   
    <?php while ($row = mysqli_fetch_assoc($data['prices'] )) { ?>

      
        <td class="card">
        <div class="card__content">
            <p class="card__text" style="color: green; font-family:Inter;"><span style="color: black; font-weight: bold; font-size: 20px;font-family: 'Verdana', sans-serif;"></br><?php echo $row['name']; ?></span></p></br>
            
            <img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>" alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>" class="card__image">
            <div class="card__details">
                <p class="card__text" style="color: black; font-family: 'Inter'; padding:15px;">1 kg: Rs.</br></br><span style="background-color:#65A534; border-radius:10px; padding:9px; color: white; font-weight: bold; font-size: 20px; font-family: 'Inter';"><?php echo $row['price']; ?></span></p>
                <div class="card__action">
            <a href="<?php echo URLROOT; ?>/admin/edit_price?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a>

        </div>  </div>
           
           </div> 
      </br></br>
      
    
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

function searchcardProducts() {
    // Declare variables
    var input, filter, cards, card, productName, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    cards = document.getElementsByClassName("card");

    // Loop through all product cards, and hide those that don't match the search query
    for (i = 0; i < cards.length; i++) {
        card = cards[i];
        productName = card.getElementsByClassName("card__text")[0];
        if (productName) {
            if (productName.textContent.toUpperCase().indexOf(filter) > -1) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        }
    }
}

</script>
        </body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
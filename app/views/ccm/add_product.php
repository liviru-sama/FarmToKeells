


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

<a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()" >
<div class="redcircle"></div>
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
                        <div class="menu" data-name="p-2" "> 
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
                        </div> </a>

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
   "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp;VIEW INVENTORY</h5>
   </a>
   <a href="<?php echo URLROOT; ?>/ccm/add_product" style="text-decoration: none;">
   <h5 class="inline-heading" class
   =
   "tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;ADD PRODUCT</h5></a>
   
        
   
           
               <section class="table_header">
   
   
               </section>

        

        </h2>

            
            <section class="form">
        <div class="center">
            <h1 style="font-family: 'inter';">Add product</h1>
            <?php if (!empty($data['error_message'])): ?>
                <div class="error-message"><?php echo $data['error_message']; ?></div>
            <?php endif; ?>
            <form action='' method="post" id="myForm">
            
            <input type="hidden" name="image" id="productImage" value="">
 
                <div class="text-field">
                    <input name='name' id="productName" type="text" required>
                    <span></span>
                    <label> Product</label>
                </div>

                
                <div class="text-field">
                     <div class="typeselect-container">
        <select class="productstatusInput" name="category" onchange="updateInput(this)">
            <option value="" disabled selected></option><!-- Empty option for placeholder -->
            <option value="hillcountry">Hill Country</option>
            <option value="organic">Organic</option>
        </select>
        <input name="type" id="categoryInput" type="text" required>
        <span></span>
        <label> Category</label>
    </div>

    <script>
    function updateInput(select) {
        var selectedOption = select.options[select.selectedIndex].text;
        document.getElementById("categoryInput").value = selectedOption;
        // Reset the dropdown to show the placeholder option
        select.value = ''; // Reset to blank option
    }
</script>
                </div>
                <div class="text-field">
                    <input name="price" type="number" required min="0" step="0.01">
                    <span></span>
                    <label> Price per kg</label>
                </div>


                <div class="text-field">
    <input name="quantity" type="number" min="0" step="1">
    <span></span>
    <label style="color:black;">Quantity in Good Condition (in Kgs)</label>
</div>

<div class="text-field">
    <input name="poor_quantity" type="number" min="0" step="1">
    <span></span>
    <label style="color:black;">Quantity in Bad Condition (in Kgs)</label>
</div>



                <!-- Error message popup -->
                <div id="error-popup" class="dialog-box">
                    <?php if(isset($_SESSION['product_exists_error'])) : ?>
                        <p><?php echo $_SESSION['product_exists_error']; ?></p>
                        <?php unset($_SESSION['product_exists_error']); ?>
                    <?php endif; ?>
                </div>

                <input type="submit" value="Add" onclick="checkForError()">
                
            </form>
        </div>
    </section>
        
        <iframe id="productSelectionFrame" src="<?php echo URLROOT; ?>/ccm/product_selection"></iframe>

    
<script>
     document.addEventListener('DOMContentLoaded', function() {
        // Get the product field
        var productField = document.getElementById('productName');
        // Get the product selection iframe
        var iframe = document.getElementById('productSelectionFrame');

        // Show the iframe when the product field is clicked
        productField.addEventListener('click', function() {
            iframe.style.display = 'block';
        });

        // Hide the iframe when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target !== productField && !productField.contains(event.target)) {
                iframe.style.display = 'none';
            }
        });

        // JavaScript code to restrict past dates in the date input field
        var purchaseDateInput = document.getElementById('purchaseDate');
        var currentDate = new Date().toISOString().split('T')[0];
        purchaseDateInput.setAttribute('min', currentDate);
    });

    function resetForm() {
    document.getElementById("myForm").reset();
}


function updateNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/ccm/notify', true);

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
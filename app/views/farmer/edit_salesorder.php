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
                    
                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" >
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2"  style="background: #65A534; transform: scale(1.08);"> 
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

    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp;Keells' purchaseorders</h5>
            </a>

                <a href="<?php echo URLROOT; ?>/farmer/edit_salesorder" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp;Edit Order</h5>
            </a>
           
</br>


      
        
    
    
<section class="header"></section>
    
<section class="form">
        <div class="center">
            <h1>Edit Sales Order</h1>
            <form action="<?php echo URLROOT; ?>/farmer/edit_salesorder/<?php echo $data['order_id']; ?>" method="post">

                <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
                <div class="text-field">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>" readonly>
                </div>
                <div class="text-field">
    <label for="type">Type:</label>
    <input type="text" name="type" id="typeInput" value="<?php echo $data['type']; ?>" onclick="openDropdown()">
    <div class="typeselect-container" id="typeDropdown" style="display: none;">
        <select class="productstatusInput" name="category" onchange="updateInput(this)">
        <option style="color:white;" value="" disabled selected></option> <!-- Empty option for placeholder -->

            <option style="color:white;" value="hillcountry">Hill Country</option>
            <option style="color:white;" value="organic">Organic</option>
        </select>
        <span></span>
    </div>
</div>

<script>
    // Function to populate input field with default value and display dropdown on click
    function openDropdown() {
        var inputField = document.getElementById('typeInput');
        var dropdown = document.getElementById('typeDropdown');
        
        // Set input field value to default value retrieved from database
        var defaultValue = '<?php echo $data['type']; ?>';
        inputField.value = defaultValue;
        
        // Display the dropdown
        dropdown.style.display = 'block';
    }
    
    // Function to update input field based on dropdown selection
    function updateInput(select) {
        var selectedOption = select.options[select.selectedIndex].text;
        document.getElementById("typeInput").value = selectedOption;
        
        // Hide the dropdown after selection
        var dropdown = document.getElementById('typeDropdown');
        dropdown.style.display = 'none';
        
        // Reset the dropdown to show the placeholder option
        select.value = ''; // Reset to blank option
    }
</script>

                <div class="text-field" >
                    <label for="quantity">Deliverable Quantity in kgs:</label>
                    <input type="number" name="quantity" value="<?php echo $data['quantity']; ?>" min="0" step="1">
                </div>
                <div class="text-field">
    <label for="price">Price per kg:</label>
    <?php if ($data['status'] === 'Pending Approval'): ?>
        <input type="number" name="price" value="<?php echo $data['price']; ?>" min="0" step="0.01">
    <?php else: ?>
        <input type="number" name="price" value="<?php echo $data['price']; ?>" min="0" step="0.01" readonly>
    <?php endif; ?>
</div>

                <div class="text-field">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="salesOrderDate" value="<?php echo $data['date']; ?>" min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="text-field">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="<?php echo $data['address']; ?>">
                </div>
                <input type="submit" value="Save">
            </form>
        </div>
    </section>

    <script>
        // JavaScript code to restrict past dates in the date input field
        document.addEventListener('DOMContentLoaded', function() {
            // Get the date input field
            var salesOrderDateInput = document.getElementById('salesOrderDate');

            // Get the current date
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the min attribute to the current date
            salesOrderDateInput.setAttribute('min', currentDate);
        });
    </script>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
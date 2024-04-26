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

        #notificationFrame,
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
        <div class="redcircle"></div>
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
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Help</h6>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!-- Main content -->
    <div class="main-content" >
        <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="text-decoration: none;">
            <h5 class="inline-heading tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;Keells Needlist</h5>
        </a>
        <a href="<?php echo URLROOT; ?>/farmer/add_salesorder" style="text-decoration: none;">
            <h5 class="inline-heading tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;Add Order</h5>
        </a>
        <br>

        <section class="header" ></section>
        <section class="form">
            <div class="center"><br><br>
                <h1>Add New Order</h1>
                <form style="padding:30px;"action='<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchase_id']; ?>' method="post" id="myForm">
                    <input type="hidden" name="user_id" value="<?php echo isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?>">
                    <!-- Hidden input field to store the purchase ID -->
                    <input type="hidden" name="purchase_id" value="<?php echo isset($data['purchase_id']) ? $data['purchase_id'] : ''; ?>">
                    <input type="hidden" name="image" id="productImage" value="<?php echo isset($data['image']) ? $data['image'] : ''; ?>">
                    <input type="hidden" name="status" id="status" value="Pending Approval">
                    <div class="text-field">
                        <input name='name' id="productName" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" readonly>
                        <span></span>
                        <label> Product</label>
                    </div>
                    <div class="text-field">
    <div class="typeselect-container">
        <select class="productstatusInput" name="category" onchange="updateInput(this)">
            <option style="color:white;" value="" selected disabled></option>
            <option style="color:white;" value="hillcountry">Hill Country</option>
            <option style="color:white;" value="organic">Organic</option>
        </select>
        <input name="type" id="categoryInput" type="text" required>
        <span></span>
        <label> Category</label>
    </div>
</div>

                    <div class="text-field">
                        <input name="date" id="salesOrderDate" type="date" required>
                        <span></span>
                        <label>Deliverable Before</label>
                    </div>
                    <div class="text-field">
        <!-- Set the maximum attribute of the quantity input field using PHP -->
        <input name="quantity" id="quantity" type="number" min="0" step="1" required <?php echo isset($data['quantity']) ? 'max="'.$data['quantity'].'"' : ''; ?>>
        <span id="quantityError" style="color: red; font-weight: bold;"></span>
        <span></span>
        <label>Deliverable Quantity in kgs</label>
    </div>
                    <div class="text-field">
                        <input name="price" type="number" min="0" step="0.01" required>
                        <span></span>
                        <label>Price per kg</label>
                    </div>
                    <div class="text-field">
                    <input name="address" type="text" value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>" required>
    <span></span>
    <label>Address</label>
</div>

                    <input type="submit" value="Add">
                </form>
            </div>
        </section>

        <!-- Product selection iframe -->
        <script>
            // JavaScript function to toggle the visibility of the dropdown

            // Close the dropdown if the user clicks outside of it

            // Get the sales order date input element
            var salesOrderDateInput = document.getElementById('salesOrderDate');

            // Get the current date
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the min attribute to the current date
            salesOrderDateInput.setAttribute('min', currentDate);

            // Function to reset the form
            function resetForm() {
                document.getElementById('myForm').reset();
            }

            function updateInput(select) {
                var selectedOption = select.options[select.selectedIndex].text;
                document.getElementById("categoryInput").value = selectedOption;
                // Reset the dropdown to show the placeholder option
                select.value = ''; // Reset to blank option
            }



            function validateQuantity() {
        var quantity = document.getElementById('quantity').value;
        var maxQuantity = <?php echo isset($data['quantity']) ? $data['quantity'] : '0'; ?>;
        var quantityError = document.getElementById('quantityError');

        if (parseInt(quantity) > maxQuantity) {
            quantityError.innerText = "Quantity cannot exceed the available quantity.";
            return false; // Prevent form submission
        }

        // Clear any previous error message
        quantityError.innerText = "";
        return true; // Allow form submission
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
    </div>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

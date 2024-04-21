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
<a href="<?php echo URLROOT; ?>/ccm/edit_product?id=<?php echo $_GET['id']; ?>" style="text-decoration: none;">
<h5 class="inline-heading" class
=
"tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;EDIT PRODUCT</h5></a>

        

        
            <section class="table_header">


            </section>


            <section class="form">
        <div class="center">
            <h1 style="font-family: 'inter';">Edit product</h1>
            <form id="addproduct" method="post" action="<?php echo URLROOT; ?>/Ccm/edit_product?id=<?=$data['product_id']?>"> 

            <input type="hidden" name="id" value="<?=$data['product_id']?>">

 

                <div class="text-field">
                    <!-- Use a disabled text field to display the product name -->
                    <input type="text" name="name" value="<?=$data['name']?>" readonly> 
                    <span></span>
                    <label> Product</label>
                </div>

                
                <div class="text-field">
    <label for="type">Type:</label>
    <input type="text" name="type" id="typeInput" value="<?php echo $data['type']; ?>" onclick="toggleDropdown()">
    <div class="typeselect-container" id="typeDropdown">
        <select class="productstatusInput" name="category" onchange="updateInput(this)">
            <option style="color:white;" value="" disabled selected></option> <!-- Empty option for placeholder -->
            <option style="color:white;" value="hillcountry">Hill Country</option>
            <option style="color:white;" value="organic">Organic</option>
        </select>
        <span></span>
    </div>
</div>

<script>
    // Function to toggle dropdown visibility
    function toggleDropdown() {
        var dropdown = document.getElementById('typeDropdown');
        
        // Toggle dropdown display
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
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


                <div class="text-field">
                    <input type="number" name="price" value="<?=$data['price']?>" required min="0" step="0.01" > <!-- Added name attribute -->
                    <span></span>
                    <label> Price per kg</label>
                </div>
                <div class="text-field">
    <input type="number" name="quantity" value="<?=$data['quantity']?>" min="0" step="1">
    <span></span>
    <label>Quantity in Good Condition (in Kgs)</label>
</div>

<div class="text-field">
    <input type="number" name="poor_quantity" value="<?=$data['poor_quantity']?>" min="0" step="1">
    <span></span>
    <label>Quantity in Bad Condition (in Kgs)</label>
</div>


                <input type="submit" value="Save">
            </form>
        </div>
    </section></main></main>

    <script>

    function submitFormWithZeroQuantity() {
    // Get the form element
    var form = document.getElementById('addproduct');

    // Set the quantity field value to 0
    document.getElementsByName('quantity')[0].value = 0;

    // Submit the form
    form.submit();
}
</script>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

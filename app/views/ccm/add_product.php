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
        <h1></h1>
    </div>

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

        

        </h2>

            
            <section class="form">
        <div class="center">
            <h1 style="font-family: 'inter';">Add product</h1>
            <form action='' method="post" id="myForm">


            <input type="hidden" name="image" id="productImage" value="">
 
                <div class="text-field">
                    <input name='name' id="productName" type="text" required>
                    <span></span>
                    <label> Product</label>
                </div>
                <div class="text-field">
                    <input name='type' type="text" required>
                    <span></span>
                    <label> Type</label>
                </div>
                <div class="text-field">
                    <input name="price" type="number" required>
                    <span></span>
                    <label> Price</label>
                </div>


                <div class="text-field">
                    <input name="quantity" type="number" required>
                    <span></span>
                    <label>Quantity(in Kgs)</label>
                </div>

                <!-- Error message popup -->
                <div id="error-popup" class="dialog-box">
                    <?php if(isset($_SESSION['product_exists_error'])) : ?>
                        <p><?php echo $_SESSION['product_exists_error']; ?></p>
                        <?php unset($_SESSION['product_exists_error']); ?>
                    <?php endif; ?>
                </div>

                <input type="submit" value="Reset" onclick="resetForm()">
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
</script>

        </body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Selection</title>
   
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/product_selection.css">
</head>
<body>
    <h1> Select Product</h1>
    <!-- Provide manual options for product selection -->
    <div class="product" onclick="fillProductField('Carrot')">
        <img src="<?php echo URLROOT; ?>/public/images/carrot.png" alt="carrot">
        <p>Carrot</p>
    </div>
    <div class="product" onclick="fillProductField('Brinjal')">
        <img src="<?php echo URLROOT; ?>/public/images/brinjal.png" alt="brinjal">
        <p>Brinjal</p>
    </div>
    <div class="product" onclick="fillProductField('Onions')">
        <img src="<?php echo URLROOT; ?>/public/images/onion.png" alt="onions">
        <p>Onions</p>
    </div>
    <div class="product" onclick="fillProductField('Tomato')">
        <img src="<?php echo URLROOT; ?>/public/images/tomato.png" alt="brinjal">
        <p>Tomato</p>
    </div>
    <div class="product" onclick="fillProductField('Ladies Finger')">
        <img src="<?php echo URLROOT; ?>/public/images/ladies.png" alt="Ladies Finger">
        <p>Ladies Finger</p>
    </div>
    <div class="product" onclick="fillProductField('Cabbage')">
        <img src="<?php echo URLROOT; ?>/public/images/cabbage.png" alt="Cabbage">
        <p>Cabbage</p>
    </div>
    <div class="product" onclick="fillProductField('Cucumber')">
        <img src="<?php echo URLROOT; ?>/public/images/cucumber.png" alt="Cucumber">
        <p>Cucumber</p>
    </div>
    <div class="product" onclick="fillProductField('Chillie')">
        <img src="<?php echo URLROOT; ?>/public/images/chillie.png" alt="Chillie">
        <p>Chillie</p>
    </div>
    <div class="product" onclick="fillProductField('Leeks')">
        <img src="<?php echo URLROOT; ?>/public/images/leeks.png" alt="Leeks">
        <p>Leeks</p>
    </div>

    <script>
        // JavaScript function to fill the input field "Product" in the parent page
        function fillProductField(productName) {
            // Get the parent window and access the input field "Product"
            var parentWindow = window.parent;
            var productInput = parentWindow.document.querySelector('input[name="name"]');
            // Set the value of the input field to the selected product name
            productInput.value = productName;
            // Hide the iframe
            parentWindow.document.getElementById('productSelectionFrame').style.display = 'none';
        }
    </script>
</body>
</html>
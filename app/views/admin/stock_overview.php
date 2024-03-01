<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Stock Overview</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>admin/stock_overview.css" media="screen">
    <script src="<?php echo JS;?>/ccm/updatecircle.js"></script>

    
</head>
<body>

<div id="product-container" class="all">
    <?php
    

    // New code: Accessing product data passed from the controller through $data array
    $products = $data['products'];

    // Set the maximum quantity to 100
    $maxQuantity = 100;

    // Check if $maxQuantity is greater than zero
    if ($maxQuantity > 0) {
        // Iterate through each product
        foreach ($products as $product):
            // Calculate percentage
            $percentage = ($product['quantity'] / $maxQuantity) * 100;
    ?>
            <div class="circle-wrap">
                <div class="circle">
                    <div class="mask full-1" style="transform: rotate(<?php echo $percentage * 1.8; ?>deg);"></div>
                    <div class="mask half"></div>
                    <div class="inside-circle"><?php echo $percentage; ?>%</div>
                </div>
                <div class="product-name"><?php echo $product['name']; ?></div> <!-- Place product name here -->
            </div>
    <?php
        endforeach;
    } else {
        // Handle the case where $maxQuantity is zero
        echo "Error: Maximum quantity is zero.";
    }
    ?>

</div>

</body>
</html>




<?php require APPROOT . '/views/inc/footer.php'; ?>

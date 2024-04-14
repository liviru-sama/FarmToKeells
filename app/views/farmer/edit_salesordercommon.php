<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/edit_product.css">
</head>

<body>
    <section class="header">
        
    </section>
    <section class="form">
        <div class="center">
            <h1>Edit Sales Order</h1>
            <form action="<?php echo URLROOT; ?>/farmer/edit_salesordercommon/<?php echo $data['order_id']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>" method="post">

                <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
                <div class="text-field">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>" readonly>
                </div>
                <div class="text-field">
                    <label for="type">Type:</label>
                    <input type="text" name="type" value="<?php echo $data['type']; ?>">
                </div>
                <div class="text-field">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" value="<?php echo $data['quantity']; ?>">
                </div>
                <div class="text-field">
                    <label for="price">Price per kg:</label>
                    <input type="text" name="price" value="<?php echo $data['price']; ?>">
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

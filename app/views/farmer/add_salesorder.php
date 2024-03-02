<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/add_product.css">
</head>

<body>
    <section class="header"></section>
    <section class="form">
        <div class="center">
            <h1>Add Sales order</h1>
            <form action='<?php echo URLROOT; ?>/farmer/add_salesorder' method="post" id="myForm">
    <!-- Hidden input field to store the purchase ID -->
    <input type="hidden" name="purchase_id" value="<?php echo $purchase_id; ?>">

    <!-- Rest of your form elements -->
    <div class="text-field">
        <input name='name' type="text" required>
        <span></span>
        <label> Product</label>
    </div>
    <!-- Add other form fields here -->

    <!-- Submit buttons -->
   

                <div class="text-field">
                    <input name='type' type="text" required>
                    <span></span>
                    <label> Category</label>
                </div>
                <div class="text-field">
                    <input name="date" type="date" required>
                    <span></span>
                    <label> Date</label>
                </div>
                <div class="text-field">
                    <input name="quantity" type="number" required>
                    <span></span>
                    <label> Stock</label>
                </div>
                <div class="text-field">
                    <input name="address" type="text" required>
                    <span></span>
                    <label> Address</label>
                </div>
                <input type="submit" value="Reset" onclick="resetForm()">
                <input type="submit" value="Add">
            </form>
        </div>
    </section>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

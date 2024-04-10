<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>forms.css">
    <script src="<?= JS ?>place_order.js"></script>
    <title><?= $data['title'] ?></title>
</head>
<body>
<section class="form">
    <div class="center">
        <h1>Request Transport</h1>
        <form action="<?= URLROOT ?>/farmer/place_order" method="post">
            <!-- Hidden input fields to store order ID and user ID -->
            <input type="hidden" name="order_id" value="<?= isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : ''; ?>">
            <input type="hidden" name="user_id" value="<?= isset($_GET['user_id']) ? htmlspecialchars($_GET['user_id']) : ''; ?>">

            <!-- Non-editable but visible fields -->
            <div class="text-field">
                <input type="text" name="product_name" id="product_name" value="<?= isset($_GET['product_name']) ? htmlspecialchars($_GET['product_name']) : ''; ?>" readonly>
                <span></span>
                <label>Product</label>
            </div>


            <div class="error" id="product-error"><?= $data['errors']['product_err']; ?></div>

            <div class="text-field">
                <input type="text" name="quantity" id="quantity" value="<?= isset($_GET['quantity']) ? htmlspecialchars($_GET['quantity']) : ''; ?>" readonly>
                <span></span>
                <label>Quantity (kg)</label>
            </div>
            <div class="error" id="quantity-error"><?= $data['errors']['quantity_err']; ?></div>

            <!-- Other form fields -->
            <div class="text-field">
                <input type="date" name="startdate" id="startdate" required>
                <span></span>
                <label>Earliest Pick-Up Date</label>
            </div>
            <div class="error" id="startdate-error"><?php echo $data['errors']['startdate_err']; ?></div>

            <div class="text-field">
                <input type="date" name="enddate" id="enddate" required>
                <span></span>
                <label>Latest Pick-Up Date</label>
            </div>
            <div class="error" id="enddate-error"><?php echo $data['errors']['enddate_err']; ?></div>

            <div class="text-field unrequired">
                <input type="text" name="notes" id="notes" placeholder="Special instructions or requirements">
                <span></span>
                <label>Additional Notes</label>
            </div>

            <input type="submit" value="Place Request">
        </form>
    </div>
</section>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

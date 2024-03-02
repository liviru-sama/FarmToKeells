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
            <form action="<?php echo URLROOT; ?>/farmer/edit_salesorder/<?php echo $data['purchase_id']; ?>" method="post">

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <div class="text-field">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>">
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
                    <label for="date">Date:</label>
                    <input type="date" name="date" value="<?php echo $data['date']; ?>">
                </div>
                <div class="text-field">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="<?php echo $data['address']; ?>">
                </div>
                <input type="submit" value="Save">
            </form>
        </div>
    </section>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

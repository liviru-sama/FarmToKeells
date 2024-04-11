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
            <h1>Edit Purchase Order</h1>
            <form method="post" action=""> <!-- Added action attribute -->
                <div class="text-field">
                    <input type="text" name="name" value="<?=$data['name']?>" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Product</label>
                </div>
                <div class="text-field">
                    <input type="text" name="type" value="<?=$data['type']?>" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Category</label>
                </div>
                <div class="text-field">
                    <input type="date" name="date" id="purchaseDate" value="<?=$data['date']?>" required> <!-- Added name attribute and id attribute -->
                    <span></span>
                    <label> Date</label>
                </div>
                <div class="text-field">
                    <input type="number" name="quantity" value="<?=$data['quantity']?>" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Stock</label>
                </div>
                <input type="submit" value="Reset" onclick="resetForm()">
                <input type="submit" value="Save">
            </form>
        </div>
    </section>

    <script>
        // JavaScript code to restrict past dates in the date input field
        document.addEventListener('DOMContentLoaded', function() {
            var purchaseDateInput = document.getElementById('purchaseDate');
            var currentDate = new Date().toISOString().split('T')[0];
            purchaseDateInput.setAttribute('min', currentDate);
        });
    </script>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

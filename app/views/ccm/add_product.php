<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <script src="<?php echo JS;?>add_product.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/add_product.css">
    <style>
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
    <section class="header">
        
    </section>
    <section class="form">
        <div class="center">
            <h1>Add product</h1>
            <form action='' method="post" id="myForm">

                <div class="text-field">
                    <input name='name' type="text" required>
                    <span></span>
                    <label> Product</label>
                </div>
                <div class="text-field">
                    <input name='type' type="text" required>
                    <span></span>
                    <label> Category</label>
                </div>
                <div class="text-field">
                    <input name="price" type="number" required>
                    <span></span>
                    <label> Price</label>
                </div>


                <div class="text-field">
                    <input name="quantity" type="number" required>
                    <span></span>
                    <label> Stock</label>
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

    <script src="<?php echo JS;?>add_product.js"></script>
    <script>
        function checkForError() {
            var errorPopup = document.getElementById('error-popup');
            if (errorPopup.innerHTML.trim() !== "") {
                errorPopup.style.display = 'block';
            }
        }
    </script>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

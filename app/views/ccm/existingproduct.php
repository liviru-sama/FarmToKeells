

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Selection</title>
   
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/existingproduct.css">
</head>
<body>
    <h1> Existing Products</h1>
    <!-- Display products dynamically -->
    <?php while ($row = mysqli_fetch_assoc($data['products'])) { ?>
        <div class="product" onclick="parent.fillProductField('<?php echo is_object($row) ? $row->name : $row['name']; ?>', '<?php echo is_object($row) ? $row->image : $row['image']; ?>')">
            <img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>" alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>">
            <p><?php echo is_object($row) ? $row->name : $row['name']; ?></p>
        </div>
    <?php } ?>

    
    <script>
        // JavaScript function to fill the input field "Product" in the parent page
        function fillProductField(productName) {
            // Get the parent window and access the input fields
            var parentWindow = window.parent;
            var productInput = parentWindow.document.querySelector('input[name="name"]');

            // Set the value of the input fields to the selected product name and image URL
            productInput.value = productName;

            // Hide the iframe
            parentWindow.document.getElementById('existingproductFrame').style.display = 'none';
        }
    </script>
</body>
</html>

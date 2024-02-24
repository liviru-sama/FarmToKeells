<?php require APPROOT . '/views/inc/header.php'; ?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $stmt = $conn->prepare("UPDATE product SET type=?, price=?, quantity=? WHERE name=?");
    $stmt->bind_param("ssis", $type, $price, $quantity, $name);

    if ($stmt->execute()) {
        echo "<h2>Data updated successfully</h2>";
        header("Location: ccm-view-inventory.php");
    } else {
        echo "<h2>Error: " . $stmt->error . "</h2>";
    }
    //if(isset($_POST['place'])) {
    //     // This code will be executed when the button is clicked
    //     header("Location:ccm-view-inventory.php");
    //     exit();
    // }
}
?>


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
            <h1>Edit product</h1>
            <form method="post" action=""> <!-- Added action attribute -->
                <div class="text-field">
                    <input type="text" name="name" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Product</label>
                </div>
                <div class="text-field">
                    <input type="text" name="type" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Category</label>
                </div>
                <div class="text-field">
                    <input type="number" name="price" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Price</label>
                </div>
                <div class="text-field">
                    <input type="number" name="quantity" required> <!-- Added name attribute -->
                    <span></span>
                    <label> Stock</label>
                </div>
                <input type="submit" value="Reset" onclick="resetForm()">
                <input type="submit" value="Save">
            </form>
        </div>
    </section>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

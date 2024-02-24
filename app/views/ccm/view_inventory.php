<?php require APPROOT . '/views/inc/header.php'; ?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE product SET type=?, price=?, quantity=? WHERE name=?");
    $stmt->bind_param("ssis", $type, $price, $quantity, $name);

    if ($stmt->execute()) {
        echo "<h2>Data updated successfully</h2>";
        header('Location:ccm-view-inventory.php');
    } else {
        echo "<h2>Error: " . $stmt->error . "</h2>";
    }
    // if (isset($_POST['place'])) {
    //     // This code will be executed when the button is clicked
    //     header("Location:ccm-view-inventory.");
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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/view_inventory.css">

</head>

<body>
    <section class="header">
       
        <h4>Product Inventory</h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name </th>
                                <th>product type</th>
                                <th>Present quantity(kgs) </th>
                                <th>Price</th>

                                <th>Edit</th>
                                <th>Delete</th>
                                <th> <a href="<?php echo URLROOT; ?>/ccm/add_product">+add product</a></th>




                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          


                            $sql = "select * from product";

                            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            $sql = "SELECT * FROM product";
                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));



                            ?>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['product_id']  ?></td>
                                    <td><?php echo $row['name']  ?></td>
                                    <td>
                                        <?php echo $row['type']  ?></td>
                                    <td><?php echo $row['quantity']  ?></td>
                                    <td><?php echo $row['price']  ?></td>


                                    <td> <a href="<?php echo URLROOT; ?>/ccm/edit_product"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
                                    <td> <a href="delete-product.php?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></button></td>

                                </tr>
                            <?php
                            }
                            ?> 
                        </tbody>
                    </table>
                </form>
            </section>
        </main>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

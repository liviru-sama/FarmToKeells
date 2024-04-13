
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/view_inventory.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }</style>
</head>

<body>
    <section class="header">
        <h4>PLACE ORDER FOR THEIR DEMAND !!!</h4>
        <main class="table">
            <section class="table_header">
            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>purchase order ID</th>
                                <th>Product</th>
                                <th>Product image</th>
                                <th>product type</th>
                                <th>needed quantity(kgs)</th>
                                <th>expected supply date</th>
                                <th>Status</th>
                                <th>place sales order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($data['purchaseorders'] )) { ?>
                                <tr>
                                    <td><?php echo $row['purchase_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>" alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>" style="width: 50px;"></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td>
                                        <!-- Display the status from the database -->
                                        <?php echo $row['purchase_status'] ?>
                                        <!-- Hidden input field to send order_id with the form -->
                                    </td>
                                    <td><a class="button" href="<?php echo URLROOT; ?>/farmer/place_salesorder/<?php echo $row['purchase_id']; ?>?user_id=<?php echo $_SESSION['user_id']; ?>"
>
Place Sales Order</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </section>
        </main>
    </section>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

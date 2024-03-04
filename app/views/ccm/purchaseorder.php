<?php require APPROOT . '/views/inc/header.php'; ?>

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
        <h4>PURCHASE ORDERS
        <a class="button" href="<?php echo URLROOT; ?>/ccm/add_purchaseorder">+ Add Purchase order</a>

        </h4>
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
                                <th>product type</th>
                                <th>needed quantity(kgs)</th>
                                <th>expected supply date</th>
                                <th>place sales order</th>
                                <th>EDIT</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($data['purchaseorders'] )) { ?>
                                <tr>
                                    <td><?php echo $row['purchase_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <!-- Add a new column for placing sales order -->
                                    <td><a class="button" href="<?php echo URLROOT; ?>/ccm/place_salesorder/<?php echo $row['purchase_id']; ?>">View Sales Order</a></td>
                                    <td><a href="<?php echo URLROOT; ?>/ccm/edit_purchaseorder?id=<?php echo $row['purchase_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
                                    <td><a href="<?php echo URLROOT; ?>/ccm/delete_purchaseorder?id=<?php echo $row['purchase_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></a></td>

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

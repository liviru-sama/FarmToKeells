<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/farmer/place_salesorder.css">
    <style>
        /* Additional CSS for centering headings */
        .table_body h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="header">
        <h4>PLACE SALES ORDERS</h4>
        <main class="table">
            <section class="table_header">
               
            </section>
            <section class="table_body">
            <br/>
                <h2>SELECTED PURCHASE ORDER</h2>
                <br/>
                <table>
                    <thead>
                        <tr>
                            <th>Purchase Order ID</th>
                            <th>Product</th>
                            <th>Product Type</th>
                            <th>Needed Quantity (kgs)</th>
                            <th>Expected Supply Date</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['purchaseorder'])) : ?>
                            <tr>
                                <td><?php echo $data['purchaseorder']->purchase_id; ?></td>
                                <td><?php echo $data['purchaseorder']->name; ?></td>
                                <td><?php echo $data['purchaseorder']->type; ?></td>
                                <td><?php echo $data['purchaseorder']->quantity; ?></td>
                                <td><?php echo $data['purchaseorder']->date; ?></td>
                                
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br/>
                <h2>SALES ORDERS</h2>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button"  href="<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchaseorder']->purchase_id; ?>">+ Add Sales Order</a>
                <table>
                    <thead>
                        <tr>
                            <th>Sales Order ID</th>
                            <th>Product</th>
                            <th>Product Type</th>
                            <th>Deliverable Quantity (kgs)</th>
                            <th>Expected Supply Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['salesorders'] as $row) : ?>
                            <tr>
                                <td><?php echo $row->order_id; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->type; ?></td>
                                <td><?php echo $row->quantity; ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
                                <td><a href="<?php echo URLROOT; ?>/farmer/delete_salesorder?id=<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </section>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

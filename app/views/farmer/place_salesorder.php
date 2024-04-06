<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">
    <style>
        /* Additional CSS for centering headings */
        .table_body h2 {
            text-align: center;
        }
        /* Add CSS for making status editable */
        .editable {
            cursor: pointer;
        }
        .editable:hover {
            background-color: #f2f2f2;
        }
        /* Add CSS for the form */
        #statusForm {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <section class="header">
        <h4>VIEW SALES ORDERS</h4>
        <main class="table">
            <section class="table_header">
               
            </section>
            <section class="table_body">
                <br/>
                <h2>Selected Purchase Order</h2>
                <br/>
                <table>
                    <thead>
                        <tr>
                            <th>Purchase Order ID</th>
                            <th>Product</th>
                            <th>Product Type</th>
                            <th>Needed Quantity (kgs)</th>
                            <th>Expected Supply Date</th>
                            <th>Status</th> <!-- Add a new column for status -->
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
                                <!-- Make the status editable -->
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br/>
                <h2>Sales Orders</h2>
                <br/>
                <!-- Form for updating status -->
                <form id="statusForm" action="<?php echo URLROOT; ?>/Ccm/updateStatus" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>Sales Order ID</th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Deliverable Quantity (kgs)</th>
                                <th>Expected Supply Date</th>
                                <th>Status</th>
                                
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
                                    <td>
                                        <!-- Display the status from the database -->
                                        <?php echo $row->status; ?>
                                        <!-- Hidden input field to send order_id with the form -->
                                    </td>
                                   
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  
                </form>
            </section>
        </main>
    </section>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

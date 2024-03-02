<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <!-- Add this before closing </body> tag -->
    <script>
    const URLROOT = "<?php echo URLROOT; ?>";

    document.addEventListener('DOMContentLoaded', function() {
        const editableStatusCells = document.querySelectorAll('.editable');
        editableStatusCells.forEach(function(cell) {
            cell.addEventListener('blur', function() {
                const purchaseId = cell.getAttribute('data-purchase-id');
                const newStatus = cell.innerText.trim();
                updateStatus(URLROOT, purchaseId, newStatus);
            });
        });
    });

    function updateStatus(urlRoot, purchaseId, newStatus) {
        fetch(urlRoot + '/Purchaseorder/updateStatus', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                purchase_id: purchaseId,
                status: newStatus
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update status');
            }
            return response.json();
        })
        .then(data => {
            // Handle successful update if needed
            console.log('Status updated successfully');
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error if needed
        });
    }
</script>


    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/farmer/place_salesorder.css">
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
                                <td class="editable" data-purchase-id="<?php echo $data['purchaseorder']->purchase_id; ?>" contenteditable="true"><?php echo $data['purchaseorder']->status; ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br/>
                <h2>Sales Orders</h2>
                <br/>
                <table>
                    <thead>
                        <tr>
                            <th>Sales Order ID</th>
                            <th>Product</th>
                            <th>Product Type</th>
                            <th>Deliverable Quantity (kgs)</th>
                            <th>Expected Supply Date</th>
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

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
        <h4>PLACE SALES ORDERS</h4>
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
                                <td>
                                        <!-- Display the status from the database -->
                                        <?php echo $data['purchaseorder']->purchase_status; ?>
                                        <!-- Hidden input field to send order_id with the form -->
                                    </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br/>
                <h2>Sales Orders</h2>
                <br/>
                <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchaseorder']->purchase_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">+ Add salesorder</a>
                <form id="statusForm" action="<?php echo URLROOT; ?>/Ccm/updateStatus" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>Sales Order ID</th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Deliverable Quantity (kgs)</th>
                                <th>Deliverable Date</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Request Transport</th>
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
                                    <td><?php echo $row->address; ?></td>
                                    <td>
                                        <!-- Display the status from the database -->
                                        <?php echo $row->status; ?>
                                        <!-- Hidden input field to send order_id with the form -->
                                    </td>
                                    <td><a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row-> order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
                                    <td><a href="<?php echo URLROOT; ?>/farmer/place_order/<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/transport.png"></a></td>
                                    <td><a href="#" onclick="confirmDelete('<?php echo URLROOT; ?>/farmer/delete_salesorder?id=<?php echo $row->order_id; ?>', '<?php echo $row->order_id; ?>')"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></a></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  
                </form>
            </section>
        </main>
    </section>
    <iframe id="confirmationDialog" style="display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; border: 1px solid #ccc;"></iframe>
    <script>
function confirmDelete(deleteUrl, orderId) {
  var confirmationDialog = document.getElementById('confirmationDialog');
  confirmationDialog.style.display = 'block';

  // Write content to iframe with transparent background and adjusted font sizes
  var iframeContent = `<style>
    body {
      overflow: hidden; /* Hide scrollbar */
    }
    .button-container {
      display: flex;
      justify-content: center;
    }
    .button-container button {
      margin-right: 10px; /* Add margin between buttons */
      background-color: black;
      color: white;
      padding: 5px 20px;
      border-radius: 25px;
      font-size: 20px;
      cursor: pointer; /* Add cursor for hover effect */
    }
    .button-container button:hover {
      background-color: green; /* Green hover effect */
    }
  </style>
  <div style="text-align: center;">
    <p style="font-size: 22px;">Are you sure you want to delete the order with ID ${orderId}?</p>
    <div style="position: absolute; bottom: 2px; width: 100%;" class="button-container">
      <button onclick="parent.cancelDelete()">No</button>
      <form id="deleteForm" method="POST" action="${deleteUrl}">
        <input type="hidden" name="order_id" id="orderIdInput" value="${orderId}">
        <button onclick="submitFormAndClose(event)">Yes</button>
      </form>
    </div>
  </div>`;
  confirmationDialog.contentDocument.body.innerHTML = iframeContent;

  // Set transparent background for iframe
  confirmationDialog.style.backgroundColor = 'transparent';
}

function submitFormAndClose(event) {
  event.preventDefault(); // Prevent default form submission behavior
  document.getElementById('deleteForm').submit();
  var confirmationDialog = document.getElementById('confirmationDialog');
  confirmationDialog.contentWindow.document.body.innerHTML = ""; // Clear iframe content
  confirmationDialog.style.display = 'none';

  // Display deletion success message in green above the table
  var deletionSuccessMessage = document.createElement('p');
  deletionSuccessMessage.textContent = 'Deletion successful';
  deletionSuccessMessage.style.color = 'green';
  deletionSuccessMessage.style.textAlign = 'center'; // Center the message
  deletionSuccessMessage.style.backgroundColor = 'lightgreen'; // Light green background
  deletionSuccessMessage.style.padding = '10px'; // Add padding for better visibility
  document.querySelector('.table_header').insertAdjacentElement('afterbegin', deletionSuccessMessage);

  // Reload parent page after 3 seconds (consider using AJAX for a smoother experience)
  setTimeout(function() {
    window.parent.location.reload();
  }, 3000);
}

function cancelDelete() {
  var confirmationDialog = document.getElementById('confirmationDialog');
  confirmationDialog.contentWindow.document.body.innerHTML = ""; // Clear iframe content
  confirmationDialog.style.display = 'none';
}
</script>


</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

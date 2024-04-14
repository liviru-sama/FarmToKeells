<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/view_inventory.css">
    <style>.disabled-link {
            pointer-events: none;
            opacity: 0.5;
            filter: grayscale(100%);
        }</style>
</head>

<body>
    <section class="header">
       
        <h4>LET THEM KNOW YOUR AVAILABLE PRODUCTS!!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesordercommon?user_id=<?php echo $_SESSION['user_id']; ?>">+ADD NEW</a>

        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
</br>        
                        <thead>
                        <a style="text-align:right;" href="<?php echo URLROOT; ?>/farmer/cardsalesorder?user_id=<?php echo $_SESSION['user_id']; ?>">Table View</a>

                            <tr>
                            <th>Product image </th>
                            <th>sales order ID</th>
                        <th>Product </th>
                        <th>product type</th>
                        <th>needed quantity(kgs) </th>
                        <th>price per kg</th>
                        <th>expected supply date</th>
                        <th>collection address</th>
                        <th>status</th>

                        <th>edit </th>
                        <th>transport</th>
                        
                        <th>request payment </th>
                        <th>delete </th>

                             </tr>
                        </thead>
                        <tbody>
                     
                            
                                

   
                        <?php 
// Check if data is not empty and is an array
if (!empty($data['salesorders']) && is_array($data['salesorders'])) {
    foreach ($data['salesorders'] as $row) {
?>
        <tr>

            <td><img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" style="width: 50px;"></td>
            <td><?php echo $row->order_id ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->type ?></td>
            <td><?php echo $row->quantity ?></td>
            <td><?php echo $row->price ?></td>
            <td><?php echo $row->date ?></td>
            <td><?php echo $row->address ?></td>
            <td><?php echo $row->status ?></td>

          

<td> <a href="<?php echo URLROOT; ?>/farmer/edit_salesordercommon?id=<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png" class="card__action"></a></td> 
<td> <a href="<?php echo URLROOT; ?>/farmer/place_order?order_id=<?php echo $row->order_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>&product_name=<?php echo urlencode($row->name); ?>&quantity=<?php echo $row->quantity; ?>&address=<?php echo urlencode($row->address); ?>" class="<?php echo $row->status !== 'Approved' ? 'disabled-link' : ''; ?>"><img src="<?php echo URLROOT; ?>/public/images/transport.png" class="card__action <?php echo $row->status !== 'Approved' ? 'disabled-link' : ''; ?>"></a></td> 
<td> <a href="<?php echo $row->status === 'Completed' ? URLROOT . '/farmer/place_order?order_id=' . $row->order_id . '&user_id=' . $_SESSION['user_id'] . '&product_name=' . urlencode($row->name) . '&quantity=' . $row->quantity . '&price=' . $row->quantity : '#'; ?>"><img src="<?php echo URLROOT; ?>/public/images/pay.png" class="card__action <?php echo $row->status !== 'Completed' ? 'disabled-link' : ''; ?>"></a></td> 
<td> <a href="#" onclick="<?php echo ($row->status === 'Rejected' || $row->status === 'Completed') ? "confirmDelete('" . URLROOT . "/farmer/delete_salesorder?id=" . $row->order_id . "', '" . $row->order_id . "')" : "return false;"; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png" class="card__action <?php echo ($row->status !== 'Rejected' && $row->status !== 'Completed') ? 'disabled-link' : ''; ?>"></a></td> 
        </tr>
<?php 

    }
} else {
    // Handle the case where no sales orders are found
    echo "<tr><td colspan='8'>No sales orders found.</td></tr>";
}
?>

<iframe id="confirmationDialog" style="display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(10, 8, 8, 0.333); padding: 20px; border: 1px solid #ccc;" src=""></iframe>
    <script>


document.addEventListener('DOMContentLoaded', function() {
    var confirmationDialog = document.getElementById('confirmationDialog');

    // Function to handle click events
    function handleClick(event) {
        // Check if the clicked element is not inside the iframe
        if (event.target !== confirmationDialog && !confirmationDialog.contains(event.target)) {
            confirmationDialog.style.display = 'none'; // Hide the iframe
            window.removeEventListener('click', handleClick); // Remove the event listener
        }
    }

    // Show the iframe when the delete button is clicked
   

    // Attach event listener to the parent window
    function init() {
        window.addEventListener('click', handleClick);
    }

    init(); // Call the function to attach event listener
});






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
        background-color: black;
        color: white;
        padding: 5px 20px;
        border-radius: 25px;
        font-size: 20px;
        cursor: pointer;
        width: 100px; /* Set a fixed width */
        height: 40px; /* Set a fixed height */
    }
    .button-container button:hover {
        background-color: green;
    }
</>

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


                        </tbody>
                    </table>
                </form>
            </section>
        </main>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

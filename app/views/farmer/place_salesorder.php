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
    <h4>PLACE SALES ORDERS</h4><main class="table">
            <section class="table_header">
               
            </section>
            <section class="table_body">
            <table>
            <thead> 
                <th><h2>Selected Purchase Order</h2> </th>
    </thead> 

               
    
       
    <tbody>
        <?php if (!empty($data['purchaseorder'])) : ?>
            <tr>
                <td><img src="<?php echo $data['purchaseorder']->image; ?>" alt="<?php echo $data['purchaseorder']->name; ?>" style="width: 200px; height: 200px;" class="card__image"></td>
                <th style="color: green; font-family: 'Arial', sans-serif;">Product: &nbsp; <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $data['purchaseorder']->name; ?></span></br></br>
                   Product Type: &nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $data['purchaseorder']->type; ?></span></br></br>
                   Needed Quantity : &nbsp; <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $data['purchaseorder']->quantity; ?>&nbsp; (kgs)</span></br></br>
                   Expected Supply Date: &nbsp; <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $data['purchaseorder']->date; ?></span></br></br>
                   Status:           &nbsp; <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"> <?php echo $data['purchaseorder']->purchase_status; ?></span></br></br>


                </th>


               
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<table>
<thead>
<th><h2>Sales Orders</h2>   <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchaseorder']->purchase_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">+ Add NEW ORDER  </a>

                <br/></th>
                   
                        
                           
                        </thead>
                        <tbody>
    <?php foreach ($data['salesorders'] as $row) : ?>
        
        <td class="card">
    <div class="card__content">
        <h3 class="card__title" style="color: green; font-family: 'Arial', sans-serif;">Order ID: &nbsp;&nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"> <?php echo $row->order_id; ?></span></h3>
        <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Product:&nbsp;&nbsp; <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->name; ?></span></p>
        <img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" class="card__image">
        <div class="card__details">
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Type: &nbsp;&nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->type; ?></span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Quantity: &nbsp;&nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->quantity; ?> (kgs)</span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Date: &nbsp;&nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->date; ?></span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Address: &nbsp;&nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->address; ?></span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Status: &nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->status; ?></span></p>
        </div>
    </div>
    <div class="card__actions">
        <a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row-> order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png" class="card__action"></a>
        <a href="<?php echo URLROOT; ?>/farmer/place_order?order_id=<?php echo $row->order_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>&product_name=<?php echo urlencode($row->name); ?>&quantity=<?php echo $row->quantity; ?>"><img src="<?php echo URLROOT; ?>/public/images/transport.png" class="card__action"></a>
        <a href="#" onclick="confirmDelete('<?php echo URLROOT; ?>/farmer/delete_salesorder?id=<?php echo $row->order_id; ?>', '<?php echo $row->order_id; ?>')"><img src="<?php echo URLROOT; ?>/public/images/delete.png" class="card__action"></a>
    </div>
</td>

        
    <?php endforeach; ?>
</tbody>

                    </table>
                  
            </section>
        </main>
    </section>
    <iframe id="confirmationDialog" style="display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; border: 1px solid #ccc;"></iframe>
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

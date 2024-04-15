<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        #notificationFrame {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff5;
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
            z-index: 9999;
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }

        .disabled-link {
  pointer-events: none; /* Disable pointer events */
  opacity: 0.5; /* Reduce opacity to indicate disabled state */
  filter: grayscale(100%); /* Optional: grayscale the image */
}


        .button.disabled {
  opacity: 0.5;
  cursor: not-allowed; /* Change cursor to indicate non-clickable */
}

    </style>
</head>

<body>
<div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">
        <a href="#" id="backButton" onclick="goBack()">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Contact">
        <a href="<?php echo URLROOT; ?>/users/contact" >
                        <img src="<?php echo URLROOT; ?>/public/images/mail.png" alt="back" class="navbar-icon">
                    </a></div>


                    <div class="navbar-icon-container" data-text="View Profile">
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon">
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">
        <a href="<?php echo URLROOT; ?>/ccm/logout">
            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a></div>

    </div>
    <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
   
</div>
<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
</script>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    
                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2"  > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4"  >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" >
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" >
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inquiry</h6>
                        </div>
                    </a>

                    
                </div>
            </div>
        </section>
    </div>
    <!-- Main content -->
    <div class="main-content">

    <div class="main-content">

    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp;Our purchaseorder</h5>
            </a>

            <a href="<?php echo URLROOT; ?>/farmer/place_salesorder" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading">Your  Salesorders</h5></a>
    
           
</br>


      
        
    
        <main class="table">
            <section class="table_header">
            </br>
            <h2 class="inline-heading">&nbsp;&nbsp;&nbsp;YOUR SALESORDERS FOR THE SELECTED PURCHASEORDER

<a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesordercommon?user_id=<?php echo $_SESSION['user_id']; ?>">+ADD NEW</a>

</h2>        <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Search products..." style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">

                                 

        </h2>
    
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
<th><h2>Sales Orders</h2>  <?php if ($data['purchaseorder']->purchase_status !== 'Completed') : ?>
  <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchaseorder']->purchase_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">+ Add NEW ORDER</a>
<?php else: ?>
  <a class="button disabled" href="#">Order is completed</a>
<?php endif; ?>


                <br/></th>
                   
                        
                           
                        </thead>
                        <tbody>
    <?php foreach ($data['salesorders'] as $row) : ?>
        
        <td class="card">
    <div class="card__content">
        <h3 class="card__title" style="color: green; font-family: 'Arial', sans-serif;">Your Order ID:<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"> <?php echo $row->order_id; ?></span></h3>
        <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">&nbsp;&nbsp; <span style="color: black; font-size: 25px; font-weight: bold; font-family: 'Verdana', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->name; ?></span></p>
        <img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" class="card__image">
        <div class="card__details"style=" text-align: center;">
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;"><span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->type; ?> product</span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;"><span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->quantity; ?>kgs</span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">1 kg: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->price; ?>/= </span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Deliverable Date:</br><span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->date; ?></span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Collection Address:</br><span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->address; ?></span></p>
            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Status: &nbsp;<span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->status; ?></span></p>
            <?php
// Assuming $row->quantity and $row->price contain the quantity and price values respectively

// Calculate the total price
$totalPrice = $row->quantity * $row->price;

// Output the total price
echo '<p class="card__text" style="font-size: 20px; color: black; font-family: \'Arial\', sans-serif;">Total Price: &nbsp;<span style="font-size: 20px; color: white; font-weight: bold; font-family: \'Verdana\', sans-serif;">' . $totalPrice . '/=</span></p>';
?>
        </div>
    </div>
    <div class="card__actions">
        <a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row-> order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png" class="card__action"></a>
        <a href="<?php echo URLROOT; ?>/farmer/place_order?order_id=<?php echo $row->order_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>&product_name=<?php echo urlencode($row->name); ?>&quantity=<?php echo $row->quantity; ?>&address=<?php echo urlencode($row->address); ?>" class="<?php echo $row->status !== 'Approved' ? 'disabled-link' : ''; ?>"><img src="<?php echo URLROOT; ?>/public/images/transport.png" class="card__action"></a>
        <a href="<?php echo $row->status === 'Completed' ? URLROOT . '/farmer/place_order?order_id=' . $row->order_id . '&user_id=' . $_SESSION['user_id'] . '&product_name=' . urlencode($row->name) . '&quantity=' . $row->quantity . '&price=' . $row->quantity : '#'; ?>">
    <img src="<?php echo URLROOT; ?>/public/images/pay.png" class="card__action <?php echo $row->status !== 'Completed' ? 'disabled-link' : ''; ?>">
</a>
<a href="#" onclick="<?php echo ($row->status === 'Rejected' || $row->status === 'Completed') ? "confirmDelete('" . URLROOT . "/farmer/delete_salesorder?id=" . $row->order_id . "', '" . $row->order_id . "')" : "return false;"; ?>">
    <img src="<?php echo URLROOT; ?>/public/images/delete.png" class="card__action <?php echo ($row->status !== 'Rejected' && $row->status !== 'Completed'&& $row->status !== 'Pending Approval') ? 'disabled-link' : ''; ?>">
</a>

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
  // Get the status value from PHP
  var purchaseStatus = "<?php echo $data['purchaseorder']->purchase_status; ?>";

  // Get the Add New Order button element
  var addButton = document.querySelector('.button');

  // Disable the button if purchase status is "completed"
  if (purchaseStatus === 'completed') {
    addButton.classList.add('disabled');
    addButton.disabled = true; // Programmatically disable the button
  }
});


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
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
        display: none;
        /* Initially hide the iframe */
        width: 80%;
        /* Adjust width as needed */
        height: 80%;
        /* Adjust height as needed */
    }

    .table_header {
        display: flex;
        justify-content: space-between;
        /* Align items to both ends */
        align-items: center;
        /* Vertically center items */
    }

    .inline-heading {
        margin: 0;
        /* Remove default margin */
    }

    .button {
        padding: 10px 20px;
        background-color: #65A534;
        color: white;
        border: 2px solid #4CAF50;
        border-radius: 5px;
        text-decoration: none;
        /* Remove default underline */
    }

    .disabled-link {
        pointer-events: none;
        /* Disable pointer events */
        opacity: 0.5;
        /* Reduce opacity to indicate disabled state */
        filter: grayscale(100%);
        /* Optional: grayscale the image */
    }

    .button.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        /* Change cursor to indicate non-clickable */
    }
    </style>

</head>

<body>
    <div class="navbar">
        <div class="navbar-icons">
            <div class="navbar-icon-container" data-text="Go Back">
                <a href="#" id="backButton" onclick="goBack()">
                    <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
                </a>
            </div>


        <div class="navbar-icon-container" data-text="Notifications">
        <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
        <div class="redcircle"></div>
<img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>





            <div class="navbar-icon-container" data-text="View Profile">
                <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout"
                        class="navbar-icon">
                </a>
            </div>


            <div class="navbar-icon-container" data-text="Logout">

                <a href="<?php echo URLROOT; ?>/farmer/logout">

                    <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
                </a>
            </div>

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

                    <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Products</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/purchaseorder"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_price"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/transport"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment"
                        style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>


                    </a> <a href="<?php echo URLROOT; ?>/farmer/inquiry"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Help</h6>
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
                <h5 class="inline-heading" class="tab-heading tab-selected"
                    style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">
                    &nbsp;&nbsp;&nbsp;Keells' Needlist</h5>
            </a>




            </br>





            <main class="table">
                </br>
                <section class="table_header" style="text-align:center;display: flex;
    justify-content: center;">
                    <h2 class="inline-heading">Selected Needlist Item </h2>







                </section>
                <section class="table_body">
                    <table>
                        <thead>
                            <tr>
                                <th>Product image</th>
                                <th>Needlist Item ID</th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Needed Quantity (kgs)</th>
                                <th>Expected Supply Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['purchaseorder'])) : ?>
                            <tr>
                                <td><img src="<?php echo $data['purchaseorder']->image; ?>"
                                        alt="<?php echo $data['purchaseorder']->name; ?>" style="width: 50px; "></td>
                                <td><?php echo $data['purchaseorder']->purchase_id; ?></td>
                                <td><?php echo $data['purchaseorder']->name; ?></td>
                                <td><?php echo $data['purchaseorder']->type; ?></td>
                                <td><?php echo $data['purchaseorder']->quantity; ?></td>
                                <td><?php echo $data['purchaseorder']->date; ?></td>
                                <td><?php echo $data['purchaseorder']->purchase_status; ?></td>

                            </tr>
                            <?php endif; ?>
                        </tbody>
                        </form>
                    </table>
                    <table>

                        </th>
                        </br>
                        <section class="table_header"
                            style="text-align: center; display: flex; justify-content: space-between; align-items: center;">
                            <h2 class="inline-heading" style="margin: 0 auto;">Manage Your Orders</h2>
                            <?php if ($data['purchaseorder']->purchase_status !== 'Completed') : ?>
                            <a class="button"
                                href="<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchaseorder']->purchase_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">Add
                                New Order</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php else: ?>
                            <a class="button disabled" href="#">Order is
                                completed</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php endif; ?>
                        </section>



                        <tbody>
                            <?php foreach ($data['salesorders'] as $row) : ?>

                            <td class="card" style="width: 10px; margin: 10px; padding: 10px;  border-radius: 10px;">
                                <div class="card__content">
                                    </br>
                                    <p class="card__text" style="color: green; font-family: 'Inter';"><span
                                            style="color: black; font-size: 25px; font-weight: bold; font-family: 'Inter';"><?php echo $row->name; ?>
                                        </span></p>
                                    <p class="card__text"
                                        style="color: black; font-weight: normal; font-family: 'Inter';"><span
                                            style="color: black; font-weight: normal; font-family:'Inter';"><?php echo $row->quantity; ?>
                                            kgs</span></p>
                                    </span></p>
                                    <div style="position: relative; display: inline-block;">
                                        <img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>"
                                            class="card__image" style="border-radius:100px;width:250px;">
                                        <p
                                            style="position: absolute; top: calc(-2% + 5px); left: 9%; background-color: black; color: white; border-radius: 15px; padding: 5px; font-weight: bold; font-family: 'Inter';">
                                            Order ID: <?php echo $row->order_id; ?></p>
                                        <p class="card__text"
                                            style="color: white; font-family: 'Inter'; position: absolute; top: calc(8% + 5px); left: 9%;">
                                            <span style="
        <?php
        // Set background color based on status
        switch ($row->status) {
            case 'Approved' :
                echo 'background-color: #65A534;'; // Green
                break;
                case 'Quality Approved' :
                    echo 'background-color: #65A534;'; // Green
                    break;
            case 'Completed' :
                echo 'background-color: grey;'; // Grey
                break;
            case 'Rejected':
                echo 'background-color: red;'; // Red
                break;
                case 'Quality Rejected':
                    echo 'background-color: red;'; // Red
                    break;
            case 'Pending Approval'|| 'pending approval' :
                echo 'background-color: white; color:black;'; // No color
                break;
            default:
                echo ''; // No color
                break;
        }
        ?>
        border-radius: 5px; padding: 5px; font-weight: bold; font-family: 'Inter', sans-serif;">
                                                <?php echo $row->status; ?>
                                            </span>
                                        </p>
                                        <div class="card__details" style="text-align: center;  left: 89%;">
                                            <p class="card__text" style="color: black; font-family: 'Inter';"><span
                                                    style="color: black;  font-weight: normal; font-family: 'Inter';"><?php echo $row->type; ?>&nbsp;
                                                </span></p>
                                            <p class="card__text"
                                                style="color: black;  font-weight: normal; font-family: 'Inter';">per Kg
                                                : <span
                                                    style="color: black; font-weight: bold; font-family: 'Inter';"><?php echo $row->price; ?>/=</span>
                                            </p>
                                            <p class="card__text"
                                                style="color: black; font-weight: normal;  font-family: 'Inter';">
                                                Deliverable before : <span
                                                    style="color: black; font-weight: bold; font-family:'Inter';"><?php echo $row->date; ?></span>
                                            </p>
                                            <p class="card__text"
                                                style="color: black;  font-weight: normal; font-family:'Inter';">From :
                                                <span
                                                    style="color: black;  font-weight: bold;  font-family:'Inter';"><?php echo $row->address; ?></span>
                                            </p>

                                        </div>
        <div class="card__actions">
            <a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row->order_id; ?>" <?php echo $row->status === 'Completed' ? 'class="disabled-link"' : ''; ?>>
                <img src="<?php echo URLROOT; ?>/public/images/edit.png" class="card__action" alt="Edit">
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/place_order/<?php echo $row->order_id; ?>" class="<?php echo $row->status !== 'Approved' ? 'disabled-link' : ''; ?>">
                <img src="<?php echo URLROOT; ?>/public/images/transport.png" class="card__action" alt="Request for payment">
            </a>
            <a href="#" onclick="<?php echo ($row->status === 'Rejected' || $row->status === 'Completed'|| $row->status === 'Approved'|| $row->status === 'Pending Approval') ? "confirmDelete('" . URLROOT . "/farmer/delete_salesorder?id=" . $row->order_id . "', '" . $row->order_id . "')" : "return false;"; ?>">
                <img src="<?php echo URLROOT; ?>/public/images/delete.png" class="card__action <?php echo ($row->status !== 'Rejected' && $row->status !== 'Completed'&& $row->status !== 'Pending Approval'&& $row->status !== 'Approved') ? 'disabled-link' : ''; ?>" alt="Delete">
            </a>
        </div>
    </div>
</td>


                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </section>
            </main>
            </section>

            <iframe id="confirmationDialog"
                style="display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; border: 1px solid #ccc;"></iframe>
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
      background
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
        background-color: #65A534;
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
                confirmationDialog.style.backgroundColor = 'white';
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


        function updateNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/farmer/notify', true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Parse response as JSON
                var response = JSON.parse(xhr.responseText);

                // Get the red circle element
                var redCircle = document.querySelector('.redcircle');

                // Update red circle based on unread notifications
                if (response.unread) {
                    redCircle.style.display = 'block'; // Show red circle
                } else {
                    redCircle.style.display = 'none'; // Hide red circle
                }
            }
        };

        xhr.send();
    }

    // Call the function initially
    updateNotifications();
    setInterval(updateNotifications, 5000);

    </script>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
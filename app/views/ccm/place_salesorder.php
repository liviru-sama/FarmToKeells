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

    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">

<a href="#" id="backButton" onclick="goBack()">
    <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
</a></div>

<div class="navbar-icon-container" data-text="Notifications">

<a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()" >
    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
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
                    <a href="<?php echo URLROOT; ?>/ccm/view_inventory" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inventory</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" style="background: #65A534; transform: scale(1.08);"> 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/report.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Time Report</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/ccm_chat" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
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
        <section class="header">

            <a href="<?php echo URLROOT; ?>/ccm/purchaseorder" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;VIEW ALL PURCHASE ORDERS</h5>
            </a>
            <a href="<?php echo URLROOT; ?>/ccm/salesorder" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >VIEW THEIR AVAILABLE PRODUCTS</h5></a>

            <main class="table">
                <section class="table_header">

                </section>
                <section class="table_body">

                    <h2>Selected Purchase Order</h2>

                    <form id="statusForm" name="purchaseOrderUpdateForm" action="<?php echo URLROOT; ?>/Ccm/updatePurchaseStatus" method="POST">


                        <table>
                            <thead>
                                <tr>
                                   <th>Product image</th>
                                    <th>Purchase Order ID</th>
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
                                        <td><img src="<?php echo $data['purchaseorder']->image; ?>" alt="<?php echo $data['purchaseorder']->name; ?>" style="width: 50px; "></td>
                                        <td><?php echo $data['purchaseorder']->purchase_id; ?></td>
                                        <td><?php echo $data['purchaseorder']->name; ?></td>
                                        <td><?php echo $data['purchaseorder']->type; ?></td>
                                        <td><?php echo $data['purchaseorder']->quantity; ?></td>
                                        <td><?php echo $data['purchaseorder']->date; ?></td>
                                        <td class="statusColumn">
                                            <div class="select-container">
                                                <select class="statusInput" name="purchase_status[]" onchange="submitForm(this)">
                                                     <option value="Pending" <?php echo ($data['purchaseorder']->purchase_status == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                     <option value="Completed" <?php echo ($data['purchaseorder']->purchase_status == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                                </select>

                                                <span class="select-arrow">&#9662;</span>
                                            </div>
                                        </td>

                                        <input type="hidden" name="purchase_order_id[]" value="<?php echo $data['purchaseorder']->purchase_id; ?>">
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <div id="purchaseOrderSuccessMessage" style="bakcground-color:#65A534"></div>
                    </form>    
                    </table>
                    <h2>Sales Orders</h2>

                    <!-- Form for updating status -->
                    <form id="statusForm" action="<?php echo URLROOT; ?>/Ccm/updateStatus" method="POST">
                        <table>
                            <thead>
                                <tr>                                    
                                    <th>Product image</th>
                                    <th>Sales Order ID</th>
                                    <th>User ID</th>
                                    <th>User </th>
                                    <th>Conatct No.</th>
                                    <th>Product</th>
                                    <th>Product Type</th>
                                    <th>Deliverable Quantity (kgs)</th>
                                    <th>Price per kg</th>
                                    <th>Expected Supply Date</th>
                                    <th>Address</th> 
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['salesorders'] as $row) : ?>
                                    <?php $userInfo = $this->getUserInfo($row->user_id);?>
                                    <!-- Inside the foreach loop for salesorders -->
                                    <tr>                                    
                                        <td><img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" style="width: 50px; "></td>
                                        <td><?php echo $row->order_id; ?></td>
                                        <td><?php echo $row->user_id; ?></td>
                                        <td><?php echo $userInfo->name; ?></td>
                                        <td><?php echo $userInfo->mobile; ?></td>
                                        <td><?php echo $row->name; ?></td>    
                                        <td><?php echo $row->type; ?></td>
                                        <td><?php echo $row->quantity; ?></td>
                                        <td><?php echo $row->price; ?></td>
                                        <td><?php echo $row->date; ?></td>
                                        <td><?php echo $row->address; ?></td>
                                        <td class="statusColumn">
                                        <div class="select-container">
        <select class="statusInput" name="status[]" onchange="submitForm(this)" <?php echo ($row->status == 'Completed') ? 'style="pointer-events: none;pointer-events: none; pointer-events: none; 
  opacity: 0.5;
  filter: grayscale(100%);"' : ''; ?>>
            <option value="Pending Approval" <?php echo (empty($row->status) || $row->status == 'Pending Approval') ? 'selected' : ''; ?> hidden>Pending Approval</option>
            <option value="Approved" <?php echo ($row->status == 'Approved') ? 'selected' : ''; ?>>Approved</option>
            <option value="Rejected" <?php echo ($row->status == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
            <option value="Completed" <?php echo ($row->status == 'Completed') ? 'selected' : ''; ?> hidden>Completed</option>
            <?php if ($row->status == 'Completed') : ?>
                <option value="Completed" selected hidden>Completed</option>
            <?php endif; ?>
        </select>
        <span class="select-arrow">&#9662;</span>
    </div>
</td>
   

                                        <input type="hidden" name="order_id[]" value="<?php echo $row->order_id; ?>">
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Success message -->
                        <div id="successMessage"style="background-color:#65A534"></div>
                        <div id="purchaseOrderSuccessMessage" style="background-color:#65A534"></div>
                    </form>
                </section>
            </main>
        </section>
    </div>

    <script>
        // Function to handle the submission of status update
        function submitForm(select) {
            const form = select.closest('form');
            const formData = new FormData(form);
            fetch(form.getAttribute('action'), {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to update status');
                    }
                    return response.text();
                })
                .then(data => {
                    // Check if the form belongs to sales orders or purchase orders
                    const successMessageId = form.id === 'statusForm' ? 'successMessage' : 'purchaseOrderSuccessMessage';
                    const successMessage = document.getElementById(successMessageId);
                    successMessage.textContent = data;
                    successMessage.style.display = 'block';
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 3000); // Hide the success message after 3 seconds
                })
                .catch(error => {
                    console.error(error);
                });
        }

        // Set default value to "Pending Approval" for newly created purchase orders
        document.addEventListener('DOMContentLoaded', function() {
            const statusInputs = document.querySelectorAll('.statusInput');
            statusInputs.forEach(function(input) {
                if (!input.value) {
                    input.value = 'Pending Approval';
                }
            });
        });

        const purchaseOrdersHeading = document.getElementById('view-purchase-orders');
        const salesOrdersHeading = document.getElementById('view-sales-orders');

        purchaseOrdersHeading.addEventListener('click', function() {
            purchaseOrdersHeading.classList.add('tab-selected');
            salesOrdersHeading.classList.remove('tab-selected');
            // Add logic to show/hide relevant content for purchase orders
        });

        salesOrdersHeading.addEventListener('click', function() {
            salesOrdersHeading.classList.add('tab-selected');
            purchaseOrdersHeading.classList.remove('tab-selected');
            // Add logic to show/hide relevant content for sales orders
        });
    </script>


</body>

</html>

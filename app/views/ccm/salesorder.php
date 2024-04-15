<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>

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
        <a href="#" id="backButton" onclick="goBack()">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a>
        <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a>
        <a href="<?php echo URLROOT; ?>/ccm/logout">
            <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
        </a>
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
                        <div class="menu" data-name="p-2"style="background: #65A534;
            transform: scale(1.08);"> 
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
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div></a>

                    <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/report.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Time Report</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
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
=
"tab-heading">&nbsp;&nbsp;&nbsp;VIEW ALL PURCHASE ORDERS</h5>
</a>
<a href="<?php echo URLROOT; ?>/ccm/salesorder" style="text-decoration: none;">
<h5 class="inline-heading"  class
=
"tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">VIEW THEIR AVAILABLE PRODUCTS</h5></a>

            <main class="table">
                <section class="table_header">

                </section>
                <section class="table_body">

            <h2>VIEW THEIR AVAILABLE PRODUCTS
        
        
        </h2>
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
    <!-- Inside the foreach loop for salesorders -->
    <tr>        
        <td><img src="<?php echo isset($row->image) ? $row->image : $row['image']; ?>" alt="<?php echo isset($row->name) ? $row->name : $row['name']; ?> " style="width: 50px; "></td>
        <td><?php echo isset($row->order_id) ? $row->order_id : $row['order_id']; ?></td>
        <td><?php echo isset($row->user_id) ? $row->user_id : $row['user_id']; ?></td>
        <?php if (is_object($row)) : ?>
            <?php $userInfo = $this->getUserInfo($row->user_id); ?>
            <td><?php echo isset($userInfo->name) ? $userInfo->name : $userInfo['name']; ?></td>
            <td><?php echo isset($userInfo->mobile) ? $userInfo->mobile : $userInfo['mobile']; ?></td>
        <?php elseif (is_array($row)) : ?>
            <?php $userInfo = $this->getUserInfo($row['user_id']); ?>
            <td><?php echo isset($userInfo->name) ? $userInfo->name : $userInfo['name']; ?></td>
            <td><?php echo isset($userInfo->mobile) ? $userInfo->mobile : $userInfo['mobile']; ?></td>
        <?php endif; ?>
        <td><?php echo isset($row->name) ? $row->name : $row['name']; ?></td>
        <td><?php echo isset($row->type) ? $row->type : $row['type']; ?></td>
        <td><?php echo isset($row->quantity) ? $row->quantity : $row['quantity']; ?></td>
        <td><?php echo isset($row->price) ? $row->price : $row['price']; ?></td>
        <td><?php echo isset($row->date) ? $row->date : $row['date']; ?></td>
        <td><?php echo isset($row->address) ? $row->address : $row['address']; ?></td>
        <td class="statusColumn">
    <div class="select-container">
        <select class="statusInput" name="<?php echo is_array($row) ? 'status[]' : $row->status; ?>" onchange="submitForm(this)" <?php echo (is_array($row) && isset($row['status']) && $row['status'] == 'Completed') ? 'style="pointer-events: none; pointer-events: none; 
  opacity: 0.5;
  filter: grayscale(100%);"' : ''; ?>>
            <option value="Pending Approval" <?php echo (empty($row['status']) || (is_array($row) && $row['status'] == 'Pending Approval')) ? 'selected' : ''; ?> hidden>Pending Approval</option>
            <option value="Approved" <?php echo (is_array($row) ? ($row['status'] == 'Approved' ? 'selected' : '') : ($row->status == 'Approved' ? 'selected' : '')); ?>>Approved</option>
            <option value="Rejected" <?php echo (is_array($row) ? ($row['status'] == 'Rejected' ? 'selected' : '') : ($row->status == 'Rejected' ? 'selected' : '')); ?>>Rejected</option>
            <option value="Completed" <?php echo (is_array($row) ? ($row['status'] == 'Completed' ? 'selected' : '') : ($row->status == 'Completed' ? 'selected' : '')); ?> hidden>Completed</option>
        </select>
        <span class="select-arrow">&#9662;</span>
    </div>
</td>


        <input type="hidden" name="order_id[]" value="<?php echo isset($row->order_id) ? $row->order_id : $row['order_id']; ?>">
    </tr>
<?php endforeach; ?>

                        </tbody>
                    </table>
                    <!-- Success message -->
                    <div id="successMessage"></div>
                    <div id="purchaseOrderSuccessMessage"></div>
                </form>
            </section>
        </main>
    </section>

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
   // Set default value to "Pending Approval" for newly created orders if status is empty
document.addEventListener('DOMContentLoaded', function() {
    const statusInputs = document.querySelectorAll('.statusInput');
    statusInputs.forEach(function(input) {
        if (!input.value) {
            input.value = 'Pending Approval';
        }
    });
});

</script>


</body>

</html>

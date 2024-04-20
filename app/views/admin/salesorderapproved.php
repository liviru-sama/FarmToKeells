<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <script src="<?php echo JS;?>ccm/searchproduct.js"></script>

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


        .table_header {
    display: flex;
    justify-content: space-between; /* Align items to both ends */
    align-items: center; /* Vertically center items */
}

.inline-heading {
    margin: 0; /* Remove default margin */
}

#searchInput {
    padding: 10px 20px;
    background-color: #65A534;
    color: white;
    border: 2px solid #4CAF50;
    border-radius: 5px;
    margin-right: 10px; /* Adjust margin-right as needed */
    width:300px;
}

.button {
    padding: 10px 20px;
    background-color: #65A534;
    color: white;
    border: 2px solid #4CAF50;
    border-radius: 5px;
    text-decoration: none; /* Remove default underline */
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

<a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()" >
    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
</a></div>

<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/admin/logout">
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
                   
                    <a href="<?php echo URLROOT; ?>/admin/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" style="background: #65A534; transform: scale(1.08);" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                  
                    
                    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div></a>

                   
                    <a href="<?php echo URLROOT; ?>/admin/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/admin/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>
    


                        <a href="<?php echo URLROOT; ?>/admin/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Reply</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/admin/manageUsers" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Users</h6>
                        </div>
                    </a>


                </div>
            </div>
        </section>
    </div>

   
    <!-- Main content -->
    <div class="main-content">

    
        <section class="header">
           
        <a href="<?php echo URLROOT; ?>/admin/purchaseorder" style="text-decoration: none;">
    <h5 class="inline-heading" class
=
"tab-heading tab-selected" >&nbsp;&nbsp;&nbsp;VIEW ALL PURCHASE ORDERS</h5>
</a>
<a href="<?php echo URLROOT; ?>/admin/salesorder" style="text-decoration: none;">
<h5 class="inline-heading" class
=
"tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;VIEW All SALESORDERS</h5></a>


<main class="table"></br>
<section class="table_header">
</br><h2>&nbsp;&nbsp;&nbsp;View All Salesorders</h2>


                <div>        <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Search their products..." style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">&nbsp;&nbsp;&nbsp;
</div>   
                </section>
                <section class="table_body">
                <a href="<?php echo URLROOT; ?>/admin/salesorder" style="text-decoration: none;">
    <h5 class="inline-heading" >&nbsp;&nbsp;&nbsp; All </h5>
</a><a href="<?php echo URLROOT; ?>/admin/salesorderpending" style="text-decoration: none;">
    <h5 class="inline-heading" >&nbsp;&nbsp;&nbsp; Pending Approval </h5>
</a><a href="<?php echo URLROOT; ?>/admin/salesorderapproved" style="text-decoration: none;">
    <h5 class="inline-heading"  style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp; Approved</h5>
</a><a href="<?php echo URLROOT; ?>/admin/salesorderrejected" style="text-decoration: none;">
    <h5 class="inline-heading"  >&nbsp;&nbsp;&nbsp; Rejected</h5>
</a><a href="<?php echo URLROOT; ?>/admin/salesordercompleted" style="text-decoration: none;">
    <h5 class="inline-heading"  >&nbsp;&nbsp;&nbsp; Completed</h5>
</a>
            <form id="statusForm" action="<?php echo URLROOT; ?>/Ccm/updateStatus" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>Product image</th>
                                <th>Sales Order ID</th>
                                <th>User ID</th>
                                <th>User </th>
                                <th>Contact No.</th>
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
        <td><img src="<?php echo isset($row->image) ? $row->image : $row['image']; ?>" alt="<?php echo isset($row->name) ? $row->name : $row['name']; ?> " ></td>
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

function searchProducts() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those that don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5]; // Index 1 corresponds to the product name column
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = ""; // Show the row if the product name matches the search query
            } else {
                tr[i].style.display = "none"; // Hide the row if it doesn't match
            }
        }
    }
}
</script>


</body>

</html>

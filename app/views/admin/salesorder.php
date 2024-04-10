<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/view_inventory.css">
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
        /* Style for the update status button */
        #statusForm button[type="submit"] {
            display: none; /* Hide the submit button initially */
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        #statusForm button[type="submit"]:hover {
            background-color: #45a049;
        }
        /* Style for success message */
        #successMessage {
            display: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <section class="header">
       
        <h4>SALES ORDERS
        
        
        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
            <form id="statusForm" action="<?php echo URLROOT; ?>/Ccm/updateStatus" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>Sales Order ID</th>
                                <th>User ID</th>
                                <th>User </th>
                                <th>Conatct No.</th>
                                <th>Product</th>
                                <th>Product image</th>
                                <th>Product Type</th>
                                <th>Deliverable Quantity (kgs)</th>
                                <th>Expected Supply Date</th>
                                <th>Address</th> 
                                <th>Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['salesorders'] as $row) : ?>
    <!-- Inside the foreach loop for salesorders -->
    <tr>        
        <td><img src="<?php echo isset($row->image) ? $row->image : $row['image']; ?>" alt="<?php echo isset($row->name) ? $row->name : $row['name']; ?>" style="width: 90px; height: 90px;"></td>
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
        <td><?php echo isset($row->date) ? $row->date : $row['date']; ?></td>
        <td><?php echo isset($row->address) ? $row->address : $row['address']; ?></td>
        <td class="statusColumn">
    <div class="select-container">
    <select class="statusInput" name="<?php echo is_array($row) ? 'status[]' : $row->status; ?>" onchange="submitForm(this)">
    <option value="Pending Approval" <?php echo (empty($row->status) || (is_array($row) && $row['status'] == 'Pending Approval')) ? 'selected' : ''; ?> disabled hidden>Pending Approval</option>
    <option value="Approved" <?php echo (is_array($row) ? ($row['status'] == 'Approved' ? 'selected' : '') : ($row->status == 'Approved' ? 'selected' : '')); ?>>Approved</option>
    <option value="Rejected" <?php echo (is_array($row) ? ($row['status'] == 'Rejected' ? 'selected' : '') : ($row->status == 'Rejected' ? 'selected' : '')); ?>>Rejected</option>
    <option value="Completed" <?php echo (is_array($row) ? ($row['status'] == 'Completed' ? 'selected' : '') : ($row->status == 'Completed' ? 'selected' : '')); ?>>Completed</option>
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
<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/view_inventory.css">

</head>

<body>
    <section class="header">
       
        <h4>SALES ORDERS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        

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
                                <th>Product Type</th>
                                <th>Deliverable Quantity (kgs)</th>
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
                                    <td><?php echo $row->order_id; ?></td>
                                    <td><?php echo $row->user_id; ?></td>
                                    <td><?php echo $userInfo->name; ?></td>
                                    <td><?php echo $userInfo->mobile; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->type; ?></td>
                                    <td><?php echo $row->quantity; ?></td>
                                    <td><?php echo $row->date; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td class="statusColumn">
                                        <div class="select-container">
                                            <select class="statusInput" name="status[]" onchange="submitForm(this)">
                                                <option value="Pending Approval" <?php echo ($row->status == 'Pending Approval') ? 'selected' : ''; ?> disabled hidden>Pending Approval</option>
                                                <option value="Approved" <?php echo ($row->status == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                                <option value="Rejected" <?php echo ($row->status == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                                <option value="Completed" <?php echo ($row->status == 'Completed') ? 'selected' : ''; ?>>Completed</option>
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

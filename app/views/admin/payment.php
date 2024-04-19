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


        

        .button-container {
    display: flex;
    flex-direction: row;
    justify-content: center; /* Centers items horizontally */
    align-items: center; /* Centers items vertically */
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
                        <div class="menu" data-name="p-2" > 
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
                        <div class="menu" data-name="p-5" style="background: #65A534; transform: scale(1.08);">
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

   

    <div class="main-content" >

    <a href="<?php echo URLROOT; ?>/admin/manageUsers" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp;Complete Payment For Orders</h5>
            </a>


    <main class="table" style="text-align:center;"></br>
            <section class="table_header">
            <?php if (!empty($data['paymentRequests'])) : ?>
    <h2>Pending Payment Requests</h2></br>
    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Order ID</th>
                <th>Product</th>
                <th>Total Price</th>
                <th>User ID</th>
                <th>Bank Account Number</th>
                <th>Account Name</th>
                <th>Bank</th>
                <th>Branch</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['paymentRequests'] as $paymentRequest) : ?>
                <?php if ($paymentRequest->status === 'pending') : ?>
                    <?php $pendingFound = true; ?>
                    <tr>
                        <!-- Display pending payment requests -->
                        <td><?php echo $paymentRequest->payment_id; ?></td>
                        <!-- Other table cells -->
                        <td><?php echo $paymentRequest->order_id; ?></td>
                        <td><?php echo $paymentRequest->product; ?></td>
                        <td><?php echo $paymentRequest->totalprice; ?></td>
                        <td><?php echo $paymentRequest->user_id; ?></td>
                        <td><?php echo $paymentRequest->bank_account_number; ?></td>
                        <td><?php echo $paymentRequest->account_name; ?></td>
                        <td><?php echo $paymentRequest->bank; ?></td>
                        <td><?php echo $paymentRequest->branch; ?></td>
                        <td><?php echo $paymentRequest->status; ?></td>
                        <td>
                            <form action="<?php echo URLROOT; ?>/payment/process_payment" method="post">
                                <!-- Hidden fields for payment processing -->
                                <input type="hidden" name="bank_account_number" value="<?php echo $paymentRequest->bank_account_number; ?>">
                                <input type="hidden" name="account_name" value="<?php echo $paymentRequest->account_name; ?>">
                                <input type="hidden" name="bank" value="<?php echo $paymentRequest->bank; ?>">
                                <input type="hidden" name="branch" value="<?php echo $paymentRequest->branch; ?>">
                                <input type="hidden" name="totalprice" value="<?php echo $paymentRequest->totalprice; ?>">
                                <input type="hidden" name="order_id" value="<?php echo $paymentRequest->order_id; ?>">
                                <!-- Submit button for payment -->
                                <button type="submit">Pay</button>
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!$pendingFound) : ?>
    <p>No pending payment requests found.</p>
<?php endif; ?>

                </br> </br> 
    <h2>Completed Payments</h2></br>
    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Order ID</th>
                <th>Product</th>
                <th>Total Price</th>
                <th>User ID</th>
                <th>Bank Account Number</th>
                <th>Account Name</th>
                <th>Bank</th>
                <th>Branch</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['paymentRequests'] as $paymentRequest) : ?>
                <?php if ($paymentRequest->status !== 'pending') : ?>
                     <?php $completedFound = true; ?>
                    <tr>
                        <!-- Display completed payment requests -->
                        <td><?php echo $paymentRequest->payment_id; ?></td>
                        <!-- Other table cells -->
                        <td><?php echo $paymentRequest->order_id; ?></td>
                        <td><?php echo $paymentRequest->product; ?></td>
                        <td><?php echo $paymentRequest->totalprice; ?></td>
                        <td><?php echo $paymentRequest->user_id; ?></td>
                        <td><?php echo $paymentRequest->bank_account_number; ?></td>
                        <td><?php echo $paymentRequest->account_name; ?></td>
                        <td><?php echo $paymentRequest->bank; ?></td>
                        <td><?php echo $paymentRequest->branch; ?></td>
                        <td><?php echo $paymentRequest->status; ?></td>
                       
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else : ?>
    <p>No payment requests found.</p>
<?php endif; ?>

    

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

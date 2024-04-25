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
                        <div class="menu" data-name="p-4" style="background: #65A534; transform: scale(1.08);">
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
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp; Manage Users</h5>
            </a>

            <a href="<?php echo URLROOT; ?>/admin/manageadmin" style="text-decoration: none;">
                <h5 class="inline-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;"  >&nbsp;&nbsp;&nbsp; Manage Admins</h5>
            </a>


    <main class="table" style="text-align:center;"></br>
            <section class="table_header">
    <h2 >Collection Center Manager Accounts &nbsp;&nbsp;&nbsp;<a class="button" href="<?php echo URLROOT; ?>/admin/ccm_register">Register New CCM</a></h2></br>
    <?php if(isset($data['success_messageccm'])): ?>
    <p style="font-weight: bold; color: white;font-size: 25px;"><?php echo $data['success_messageccm']; ?></p>
<?php endif; ?>
    <?php $ccm = $data['ccm']; ?>
    <?php if (!empty($ccm)): ?>

        <class="table_body">
        <table>
            <thead>
                <tr>
                    <th>CCM ID</th>
                    <th>UserName</th>
                    <th>Email</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($ccm as $user): ?>
                    <tr>
                    <td><?= $user['admin_id']; ?></td>
                    <td><?= $user['admin_username']; ?></td>
                    <td><?= $user['email']; ?></td>

                        

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No CCM accounts.</p>
    <?php endif; ?>

    </br>  <h2> Transportation Manager Accounts&nbsp;&nbsp;&nbsp;<a class="button" href="<?php echo URLROOT; ?>/admin/tm_register">Register New TM</a>
</h2></br>

<?php if(isset($data['success_messagetm'])): ?>
    <p style="font-weight: bold; color: white;font-size: 25px;"><?php echo $data['success_messagetm']; ?></p>
<?php endif; ?>

    <?php $tm = $data['tm']; ?>
    <?php if (!empty($tm)): ?>
        <table>
            <thead>
                <tr>
                <th>TM ID</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Registered Collectioncenter</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($tm as $user): ?>
                    <tr>
                    <td><?= $user['admin_id']; ?></td>
                    <td><?= $user['admin_username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['collectioncenter']; ?></td>

                       
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No TM accounts.</p>
    <?php endif; ?>

    </br> <h2>Quality Inspector Accounts &nbsp;&nbsp;&nbsp;<a class="button" href="<?php echo URLROOT; ?>/admin/qi_register">Register New QI</a></h2></br>
    <?php if(isset($data['success_messageqi'])): ?>
    <p style="font-weight: bold; color: white;font-size: 25px;"><?php echo $data['success_messageqi']; ?></p>
<?php endif; ?>
    <?php $qi = $data['qi']; ?>
    <?php if (!empty($qi)): ?>
        <table>
            <thead>
                <tr>
                <th>QI ID</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Registered Collectioncenter</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($qi as $user): ?>
                    <tr>
                    <td><?= $user['admin_id']; ?></td>
                    <td><?= $user['admin_username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['collectioncenter']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No QI accounts.</p>
    <?php endif; ?>


    <br>

</body>
<br>
</html>
<br>
<?php require APPROOT . '/views/inc/footer.php'; ?>

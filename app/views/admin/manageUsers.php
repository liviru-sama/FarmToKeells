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
        display: none;
        /* Initially hide the iframe */
        width: 80%;
        /* Adjust width as needed */
        height: 80%;
        /* Adjust height as needed */
    }




    .button-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        /* Centers items horizontally */
        align-items: center;
        /* Centers items vertically */
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
                </a>
            </div>

            <div class="navbar-icon-container" data-text="Notifications">

<a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()" >
<div class="redcircle"></div>
<img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
</a></div>
                <a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton"
                    onclick="toggleNotifications()">
                    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications"
                        class="navbar-icon">
                </a>
            </div>

            <div class="navbar-icon-container" data-text="Logout">

                <a href="<?php echo URLROOT; ?>/admin/logout">
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

                    <a href="<?php echo URLROOT; ?>/admin/purchaseorder"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>



                    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div>
                    </a>


                    <a href="<?php echo URLROOT; ?>/admin/transport"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Transport</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/admin/payment"
                        style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>



                    <a href="<?php echo URLROOT; ?>/admin/inquiry"
                        style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Reply</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/admin/manageUsers"
                        style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt=""
                                style="width: 50px; height: 50px;">
                            <h6>Users</h6>
                        </div>
                    </a>


                </div>
            </div>
        </section>
    </div>



    <div class="main-content">

        <a href="<?php echo URLROOT; ?>/admin/manageUsers" style="text-decoration: none;">
            <h5 class="inline-heading" class="tab-heading tab-selected"
                style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">
                &nbsp;&nbsp;&nbsp; Manage Users</h5>
        </a>

        <a href="<?php echo URLROOT; ?>/admin/manageadmin" style="text-decoration: none;">
            <h5 class="inline-heading">&nbsp;&nbsp;&nbsp; Manage Admins</h5>
        </a>


        <main class="table" style="text-align:center;"></br>
            <section class="table_header">
                <h2>Pending Users</h2></br>

                <?php $pendingUsers = $data['pendingUsers']; ?>
                <?php if (!empty($pendingUsers)): ?>
                <section class="table_body">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Collection Center</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pendingUsers as $user): ?>
                            <tr>
                                <td><?= $user->id; ?></td>
                                <td><?= $user->name; ?></td>
                                <td><?= $user->mobile; ?></td>
                                <td><?= $user->province; ?></td>
                                <td><?= $user->collectioncenter; ?></td>
                                <td>
                                    <div class="button-container">
                                        <form action="<?= URLROOT; ?>/admin/acceptUser" method="post"
                                            class="button-form">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                            <button type="submit" name="accept" style="background-color:#65A534; border: none;">Accept</button>
                                        </form>
                                        <form action="<?= URLROOT; ?>/admin/rejectUser" method="post"
                                            class="button-form">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                            <button type="submit" name="reject" style="background-color:#ff4040; border: none;">Reject</button>
                                        </form>
                                        <!-- <form action="<?= URLROOT; ?>/admin/deleteUser" method="post">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                            <button type="submit" name="delete"
                                                style="background-color:red;">Delete</button>
                                        </form> -->
                                    </div>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p>No pending users.</p>
                    <?php endif; ?>

                    </br><br>
                    <h2>Accepted Users</h2></br>

                    <?php $acceptedUsers = $data['acceptedUsers']; ?>
                    <?php if (!empty($acceptedUsers)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Province</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($acceptedUsers as $user): ?>
                            <tr>
                                <td><?= $user->id; ?></td>
                                <td><?= $user->name; ?></td>
                                <td><?= $user->mobile; ?></td>
                                <td><?= $user->province; ?></td>
                                <td><?= $user->collectioncenter; ?></td>
                                <td>
                                    <div class="button-container">

                                        <form action="<?= URLROOT; ?>/admin/rejectUser" method="post"
                                            class="button-form">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                            <button type="submit" name="reject" style="background-color: #ff4040; border: none;">Reject</button>

                                        </form>
                                        <!-- <form action="<?= URLROOT; ?>/admin/deleteUser" method="post">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                            <button type="submit" name="delete"
                                                style="background-color:red;">Delete</button>
                                        </form> -->
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p>No accepted users.</p>
                    <?php endif; ?>

                    </br>
                    <h2>Rejected Users</h2></br>

                    <?php $rejectedUsers = $data['rejectedUsers']; ?>
                    <?php if (!empty($rejectedUsers)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Province</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rejectedUsers as $user): ?>
                            <tr>
                                <td><?= $user->id; ?></td>
                                <td><?= $user->name; ?></td>
                                <td><?= $user->mobile; ?></td>
                                <td><?= $user->province; ?></td>
                                <td><?= $user->collectioncenter; ?></td>
                                <td>
                                    <div class="button-container">
                                        <form action="<?= URLROOT; ?>/admin/acceptUser" method="post"
                                            class="button-form">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>"> 
                                            <button type="submit" name="accept" style="background-color:#65A534; border: none;">Accept</button>
                                        </form>
                                        <!-- <form action="<?= URLROOT; ?>/admin/deleteUser" method="post">
                                            <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                            <button type="submit" name="delete"
                                                style="background-color:red;">Delete</button>
                                        </form> -->
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p>No rejected users.</p>
                    <?php endif; ?>

    <br><br>
    
<script>function updateNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/admin/notify', true);

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
    setInterval(updateNotifications, 5000);</script>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
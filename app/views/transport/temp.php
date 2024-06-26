<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">
    <link rel="stylesheet" href="<?php echo CSS;?>tables.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        #notificationFrame,
        #productSelectionFrame {
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

        .text-field textarea {
            width: 100%;
            padding: 10px;
            border: 9px solid #ccc; /* Add a border */
            border-radius: 10px; /* Add border radius */
            background-color: transparent; /* Set transparent background */
            resize: vertical; /* Allow vertical resizing */
            box-sizing: border-box; /* Include padding and border in textarea's total width */
        }

        /* Optional: Style the label */
        .text-field label {
            display: block;
            margin-bottom: 5px;
        }

        .chat-message {
            margin-bottom: 10px;
            max-width: 70%;
            padding: 20px;
            border-radius: 30px;
            clear: both;
            overflow: hidden;
            word-wrap: break-word;
            z-index: 9999;
            font-size: 20px;
            box-shadow: 0 .4rem .8rem #0005;
        }

        .admin-message {
            float: left;
            background-color: white;
            color: black;
        }

        .message-time {
            float: left;
            color: black;
            font-size: 10px;
        }

        .user-message {
            float: right;
            background-color: #65A534; /* Green color */
            color: white;
            text-align: right;
        }

        .empty-reply {
            background-color: white; /* Green color */
        }

        .chat-container {
            padding: 20px;
            position: relative;
            margin-bottom: -10px; /* Negative margin equal to desired bottom padding */
        }

        .chat-form-container {
            width: 100%;
        }

        .add-inquiry-form {
            position: fixed;
            top: 10%;
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            z-index: 999;
            border-radius: 10px;
            left: 28%;
        }

        .add-inquiry-form textarea {
            width: 100%; /* Adjust width to accommodate padding */
            padding: 10px;
            border: 2px solid black;
            border-radius: 10px;
            background-color: transparent;
            resize: none; /* Prevent resizing */
            box-sizing: border-box;
            z-index: 1;
        }

        .add-inquiry-form .send-button {
            width: 100%; /* Adjust width to accommodate padding */
            background-color: rgba(181, 174, 174, 0.25);
            color: white;
            border-radius: 10px;
            padding: 10px;
            cursor: pointer;
            box-sizing: border-box;
            font-weight: bold;
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
                <a href="<?php echo URLROOT; ?>/ccm/notifications" id="notificationsButton" onclick="toggleNotifications()">
                <div class="redcircle"></div>
 <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
                </a>
            </div>
            <div class="navbar-icon-container" data-text="Logout">
                <a href="<?php echo URLROOT; ?>/transport/logout">
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
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                    <a href="<?php echo URLROOT; ?>/tranport/requests" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" <?php echo ($side==1) ? "style='background: #65A534; transform: scale(1.08);'" : ""; ?>> 
                            <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Requests</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/salesorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" <?php echo ($side==2) ? "style='background: #65A534; transform: scale(1.08);'" : ""; ?>>
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/monitor" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" <?php echo ($side==3) ? "style='background: #65A534; transform: scale(1.08);'" : ""; ?>>
                            <img src="<?php echo URLROOT; ?>/public/images/monitor.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Monitor</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/drivers" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" <?php echo ($side==4) ? "style='background: #65A534; transform: scale(1.08);'" : ""; ?>>
                            <img src="<?php echo URLROOT; ?>/public/images/driver.png" alt="" style="width: 50px; height: 50px;">
                            <h6>drivers</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/drivers" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7" <?php echo ($side==5) ? "style='background: #65A534; transform: scale(1.08);'" : ""; ?>>
                            <img src="<?php echo URLROOT; ?>/public/images/vehicle.png" alt="" style="width: 50px; height: 50px;">
                            <h6>vehicles</h6>
                        </div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/transport/tm_chat" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" <?php echo ($side==6) ? "style='background: #65A534; transform: scale(1.08);'" : ""; ?>>
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inquiry</h6>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <div class="main-content">
        <section class="header">  
        </section>
        <section class="table_body">
        <div class="midbox">
            <h2>Collection Requests</h2>
            <div class="tabs">
                <a href="<?php echo URLROOT; ?>/transport/pending_requests">
                    <button class="tab activeTab" id="pendingTab">Pending</button>
                </a>
                <a href="<?php echo URLROOT; ?>/transport/cancelled_requests">
                    <button class="tab" id="cancelledTab">Cancelled</button>
                </a>
            </div>
            <table>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Window Start</th>
                    <th>Window End</th>
                    <th>Action</th>
                </tr>
                <?php foreach($data['activeRequests'] as $request) {
                    echo "<tr>
                        <td>".$request->req_id."</td>
                        <td>".$request->user."</td>
                        <td>".$request->product_name."</td>
                        <td>".$request->quantity."</td>
                        <td>".$request->startdate."</td>
                        <td>".$request->enddate."</td>
                        <td></td>
                    </tr>";
                } ?>
                
            </table>
        </div>
        </div>
        </section>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
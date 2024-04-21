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
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }

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
            border: 2px solid #ccc; /* Add a border */
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
            padding: 10px;
            border-radius: 10px;
            clear: both;
        }

        .admin-message {
            float: left;
            background-color: white;
            color: black;
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

        .add-inquiry-form {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            min-height: 100vh;
            padding-bottom: 20px; /* Adjust as needed */
        }

        .chat-container {
            max-height: calc(100vh - 200px); /* Adjust as needed */
            overflow-y: auto;
            padding: 10px;
            width: 100%;
        }

        .inquiry-form {
            width: 100%;
            max-width: 500px; /* Adjust as needed */
            padding: 10px;
            box-sizing: border-box;
        }

        .text-field {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }

        textarea {
            width: calc(100% - 120px); /* Adjust as needed */
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: transparent;
            resize: vertical;
            box-sizing: border-box;
        }

        .send-button {
            width: 100px; /* Adjust as needed */
            background-color: #65A534;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            cursor: pointer;
            margin-left: 20px; /* Adjust as needed */
        }
    </style>
</head>

<body>
<div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">
        <a href="#" id="backButton" onclick="goBack()">
            <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
        </a></div>


        <div class="navbar-icon-container" data-text="Notifications">

                  <a href="<?php echo URLROOT; ?>/farmer/notifications" id="notificationsButton" onclick="toggleNotifications()">
            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
        </a></div>


      


                    <div class="navbar-icon-container" data-text="View Profile" >
                    <a href="<?php echo URLROOT; ?>/farmer/view_profile">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash6.png" alt="logout" class="navbar-icon" >
                    </a></div>


<div class="navbar-icon-container" data-text="Logout">
        <a href="<?php echo URLROOT; ?>/farmer/logout">
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

                <a href="<?php echo URLROOT; ?>/farmer/salesorder?user_id=<?php echo $_SESSION['user_id']; ?>" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                    <div class="menu" data-name="p-1">
                        <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                        <h6>Products</h6>
                    </div>
                </a>

                <a href="<?php echo URLROOT; ?>/farmer/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                    <div class="menu" data-name="p-2">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                        <h6>Orders</h6>
                    </div>
                </a>

                <a href="<?php echo URLROOT; ?>/farmer/view_price" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                    <div class="menu" data-name="p-4">
                        <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                        <h6>Market Prices</h6>
                    </div>
                </a>

                <a href="<?php echo URLROOT; ?>/farmer/transport" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                    <div class="menu" data-name="p-7">
                        <img src="<?php echo URLROOT; ?>/public/images/transport.png" alt="" style="width: 50px; height: 50px;">
                        <h6>Transport</h6>
                    </div>
                </a>

                <a href="<?php echo URLROOT; ?>/farmer/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                    <div class="menu" data-name="p-5">
                        <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                        <h6>Payment</h6>
                    </div>
                </a>

                <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                    <div class="menu" data-name="p-6" style="background: #65A534; transform: scale(1.08);">
                        <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                        <h6>Help</h6>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>

<!-- Main content -->
<div class="main-content">
    <!-- Header and table body content -->
    <section class="header"></section>
    <div class="chat-container">
        <?php foreach ($data['inquiries'] as $inquiry): ?>
            <!-- User inquiry message -->
            <div class="chat-message user-message">
                <div class="message-content"><?php echo $inquiry->inquiry; ?></div>
                <div class="message-time"><?php echo $inquiry->created_at; ?></div>
            </div>

            <!-- Admin reply message -->
            <?php if (!empty($inquiry->admin_reply)): ?>
                <div class="chat-message admin-message">
                    <div class="message-content"><?php echo $inquiry->admin_reply; ?></div>
                    <div class="message-time"><?php echo $inquiry->admin_reply_time; ?></div>
                </div>
            <?php else: ?>
                <div class="chat-message admin-message empty-reply"></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="add-inquiry-form">
        <form action="<?php echo URLROOT; ?>/farmer/sendInquiry" method="post" class="inquiry-form">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="hidden" name="username" value="<?php echo $data['user_data']->username; ?>">
            <input type="hidden" name="contact_no" value="<?php echo $data['user_data']->mobile; ?>" readonly>
            <input type="hidden" name="email" value="<?php echo $data['user_data']->email; ?>" readonly>

            <div class="text-field">
                <textarea name="inquiry" rows="4" cols="50" required></textarea>
                <span></span>
            </div>

            <input type="submit" value="Send Inquiry" class="send-button">
        </form>
    </div>
    </section>
</div>

<!-- Footer content -->
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

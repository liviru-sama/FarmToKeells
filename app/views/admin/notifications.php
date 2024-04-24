<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>farmer/view_profile.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        

.form-button {
    color: white;
    width: 80%;
    height: 45px;
    border: 0 solid #65A534;
    background:#65A534;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    margin: 20px 10px;
}

.chat-message {
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 30px;
            clear: both;
            overflow: hidden;
            word-wrap: break-word;
            z-index: 9999;
            font-size: 22px;
            box-shadow: 0 .4rem .8rem #0005;
        }

        .admin-message {
            background-color:#65A534;
            color: white;
        }

        .message-time {
            float: right;
            color: black;
            font-size: 10px;
        }

        .user-message {
            float: right;
            background-color: #65A534; /* Green color */
            color: white;
            text-align: right;
        }

       

        .chat-container {
    padding-left: 80px; /* Horizontal padding */
    padding-right: 80px; /* Horizontal padding */
    padding-top: 0px; /* Minimal vertical padding */
    padding-bottom: 20px; /* Minimal vertical padding */
    position: relative;
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

<a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()" >
    <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon" style="background: #65A534; transform: scale(1.28);">
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
                        <div class="menu" data-name="p-6"  >
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
    <div class="main-contents" style=" position: fixed;
            left: 9.0%;
            width: 91%;
            height: 91%;
            bottom: 0;
            z-index: 2;
            overflow: auto;
            border-radius: 20px;" >

   
   
           

<section class="header"></section>
<section class="header">
        </section>
        <section class="table_body">

        <div class="chat-container" id="chatContainer">
        <?php if (empty($data['notifications'])): ?>
    <p>You don't have any notifications yet.</p>
<?php else: ?>
    <table>
    <?php 
    // Sort notifications array by time in descending order
    usort($data['notifications'], function($a, $b) {
        return strtotime($b->time) - strtotime($a->time);
    });
    
    foreach ($data['notifications'] as $notification): ?>
        <p >
            <div style="background-color:#65A534;
                color: white; border-radius: 90px;
                overflow: hidden;
                word-wrap: break-word;
                z-index: 9999;
                font-size: 22px;
                box-shadow: 0 .4rem .8rem #0005;
                text-align:left;">
                <?php switch ($notification->action):
                  case 'new_order':
                    if ($notification->purchase_product !== NULL) {
                        echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User '{$notification->user}' has placed a new order - {$notification->quantity} kgs of '{$notification->product}' for your Needlist item '{$notification->purchase_product}'</br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                    } else {
                        echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User '{$notification->user}' has placed a new order - {$notification->quantity} kgs of '{$notification->product}'  </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                    }
                    break;
                    case 'reply':
                        if ($notification->ccm_reply !== NULL) {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp Collection Center Manager has replied   '{$notification->ccm_reply}'  for your Message </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        } else {
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transportation Manager has replied  '{$notification->tm_reply }'  for your Message </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        }                        break;
                    case 'farmerreply':
                        echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User '{$notification->user}' has sent you an inquiry '{$notification->inquiry}'. Please respond promptly. </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";

                        break;
                    case 'payment':
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User {$notification->user}'s Order for '{$notification->product}' with ID {$notification->order_id} has Completed just now. Its time to pay him Rs. {$notification->totalprice} /= </br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        
                        break;
                    case 'newuser':
                       
                            echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User {$notification->user}  has just registered an account.  Please take immediate action to accept the registration.</br> <div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        
                        break;
                    case 'low':
                      
                        echo "<div style='padding: 25px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The stock of '{$notification->product}' at the warehouse is running critically low, with only {$notification->quantity} kgs remaining.</br>Please prioritize placing a new order for {$notification->product}. </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class='message-time'>{$notification->time}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></div>";
                        
                        break;
                endswitch; ?>
            </div>
        </p>
    <?php endforeach; ?>
</table>


<?php endif; ?>

</div>



</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

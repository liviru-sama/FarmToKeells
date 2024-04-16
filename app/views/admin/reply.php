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
    z-index:9999;
}


.admin-message {
    float: right;
    background-color: #65A534;
    color: white;
}

.message-time {
    float: left;
    color: black;
    font-size:10px;
}

.user-message {
    float:left;
    background-color: white; /* Green color */
    color: black;
    text-align: right;
}

.empty-reply {
    background-color: #65A534; /* Green color */
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
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    z-index: 999;
    border-radius: 10px;
    left:18%;
    background-color:rgba(181, 174, 174, 0.35);
    z-index:1;
    padding: 50px;


}
.add-inquiry-form textarea {
    width: calc(100% - 20px); /* Adjust width to accommodate padding */
    padding: 10px;
    border: 2px solid white;
    border-radius: 10px;
    background-color: transparent;
    resize: none; /* Prevent resizing */
    box-sizing: border-box;
    margin-bottom: 10px; /* Add some spacing between textarea and submit button */
    font-size:20px;

}

.add-inquiry-form .send-button {
    width: calc(100% - 20px); /* Adjust width to accommodate padding */
    background-color: #65A534;
    color: white;
    border-radius: 10px;
    padding: 10px;
    cursor: pointer;
    box-sizing: border-box;
    font-weight: bold;
    margin: 0 auto; /* Center the button horizontally */
    border: 2px solid white;

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
                   
                    <a href="<?php echo URLROOT; ?>/ccm/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" > 
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
                        <div class="menu" data-name="p-6" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Reply</h6>
                        </div>
                    </a>


                </div>
            </div>
        </section>
    </div>

    <div class="main-content">

  
    <a href="<?php echo URLROOT; ?>/admin/inquiry" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp; User Inquiries</h5>
            </a>

    <a href="<?php echo URLROOT; ?>/admin/ccm_chat" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading">Chat with CCM</h5></a>

                <a href="<?php echo URLROOT; ?>/admin/tm_chat" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected"  >&nbsp;&nbsp;&nbsp;Chat with TM</h5>
            </a>
            

    <form action="<?php echo URLROOT; ?>/admin/sendReply" method="post">
    <input type="hidden" name="inquiry_id" value="<?php echo htmlspecialchars($_GET['inquiry_id'] ?? ''); ?>">
      
    <div class="add-inquiry-form">
        <h2 style="text-align:center;">Reply to <?php echo htmlspecialchars($data['inquiry']->username); ?></br></br></br></h2>

        <!-- Display user name and inquiry above the textarea -->
        <?php if (!empty($data['inquiry'])): ?>
            <textarea style="border:2px solid black;font-size:20px;" rows="4" cols="50" readonly><?php echo htmlspecialchars($data['inquiry']->username . ':   ' . $data['inquiry']->inquiry); ?></textarea>
        <?php endif; ?>

        <!-- Textarea for admin reply -->
       
       <textarea id="admin_reply" name="admin_reply" rows="4" cols="50" required placeholder="Type your reply..."><?php echo htmlspecialchars($data['inquiry']->admin_reply); ?></textarea>



        <!-- Submit button -->
        <input type="submit" value="Send" class="send-button">
    </div>
</form>

        </body>    </div>
        </div>
        </div>


</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

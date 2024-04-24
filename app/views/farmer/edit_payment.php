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

                    <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/farmer/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Help</h6>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!-- Main content -->
    <div class="main-content" >

    <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected"  >&nbsp;&nbsp;&nbsp;View Your Payment Details</h5>
            </a>
            <a href="<?php echo URLROOT; ?>/farmer/payment" style="text-decoration: none;">
            <h5 class="inline-heading " >&nbsp;&nbsp;&nbsp;View Order Payments</h5>
        </a> 

            <a href="<?php echo URLROOT; ?>/farmer/view_payment" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;" >&nbsp;&nbsp;&nbsp;Edit Your Payment Details</h5>
            </a>
        <section class="header">
            <!-- Header content -->
        </section>
        <section class="form">
            <div class="center">
        <h1>Edit Payment Details</h1>
        <form action="<?php echo URLROOT; ?>/farmer/handle_edit_payment" method="post">
            <div class="text-field">
                <label for="bank_account_number">Your Bank Account Number:</label><br>
                <input type="text" id="bank_account_number" name="bank_account_number" value="<?php echo $data['bank_account_number']; ?>"><br>
            </div>
            <div class="text-field">
                <label for="account_name">Account Holder Name:</label><br>
                <input type="text" id="account_name" name="account_name" value="<?php echo $data['account_name']; ?>"><br>
            </div>
            <div class="text-field">
    <div class="typeselect-container">
        <select class="productstatusInput" name="bank" onchange="updateInput(this)">
            <option style="color:white;" value="" <?php echo ($data['bank'] == '') ? 'selected' : ''; ?>></option>
            <option style="color:white;" value="" disabled selected></option> <!-- Empty option for placeholder -->
            <option style="color:white;" value="Commercial Bank (COMB)">Commercial Bank (COMB)</option>
                                <option style="color:white;" value="Bank of Ceylon (BOC)">Bank of Ceylon (BOC)</option>
                                <option style="color:white;" value="People's Bank">People's Bank</option>
                                <option style="color:white;" value="Hatton National Bank (HNB)">Hatton National Bank (HNB)</option>
                                <option style="color:white;" value="National Development Bank (NDB)">National Development Bank (NDB)</option>
                                <option style="color:white;" value="Nations trust Bank (NTB)">Nations trust Bank (NTB)</option>
                                <option style="color:white;" value="Sampath Bank (SAMP) ">Sampath Bank (SAMP) </option>
                                <option style="color:white;" value="Seylan Bank (SEYB)">Seylan Bank (SEYB)</option>
                                <option style="color:white;" value="DFCC Bank (DFCC)">DFCC Bank (DFCC)</option>
        </select>
        <input name="bank" id="bank" type="text" required value="<?php echo $data['bank']; ?>">
        <span></span>
        <label for="bank">Bank</label>
    </div>
</div>


            <div class="text-field">
                <label for="branch">Bank Branch:</label><br>
                <input type="text" id="branch" name="branch" value="<?php echo $data['branch']; ?>"><br>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="submit" value="Submit">
        </form>
    </div>


    <script>
    // JavaScript function to update the input field when an option is selected
    function updateInput(select) {
        var selectedOption = select.options[select.selectedIndex].text;
        // Set the value of the bank input field directly
        document.getElementById("bank").value = selectedOption;
        // Reset the dropdown to show the placeholder option
        select.value = ''; // Reset to blank option
    }

    // JavaScript function to show the dropdown menu when the bank input field is clicked
    function showDropdown() {
        var select = document.getElementById("bankDropdown");
        select.style.display = 'block';
    }
</script>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

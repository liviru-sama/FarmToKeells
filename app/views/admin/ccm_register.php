
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <script src="<?php echo JS;?>add_product.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/add_product.css">
    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .navbar {
                position: fixed; /* Fixed position */
                left: 0%; /* Adjust as needed */
                right: 0%; /* Adjust as needed */
                width: 100%; /* Take up the remaining width */
                display: flex;
                justify-content: space-between; /* Distribute items along the main axis */
                align-items: center;
                padding: 20px;
                top: 0px; /* Stick to the top of the viewport */
                z-index: 1;
                height: 20px; /* Fixed height for navbar */
                /* Example background color */
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Example box shadow */
            }
        
            .navbar-logo {
    width: auto; /* Allow the logo to adjust its width based on its content */
    height: 40px; /* Set a fixed height for consistency */
    margin-right: 30px; /* Adjust as needed */
}

            .navbar-icons {
                display: flex;
                align-items: center;
            }
            
            .navbar-icon {
                width: 50px; /* Increased width for icons */
                height: auto; /* Maintain aspect ratio */
                margin-left: 35px; /* Adjust spacing between icons */
                box-shadow: 0 0.9rem 0.8rem rgba(0, 0, 0, 0.1); /* Box shadow */
                border-radius: 50px; /* Border radius */
                padding: 5px; /* Increase the padding to create gap */
            }
        
            .navbar-icon:hover {
                background: #65A534;
                transform: scale(1.08);
            }
            
            .navbar-icon-container {
    position: relative;
}

.navbar-icon-container:hover::after {
            content: attr(data-text); /* Display the value of the data-text attribute */
            position: absolute;
            top: 100%; /* Position the text below the icon */
            left: 50%; /* Center the text horizontally */
            transform: translateX(-50%); /* Center the text horizontally */
            background-color: #65A534; /* Background color for the text */
            color: white; /* Text color */
            padding: 5px; /* Padding around the text */
            border-radius: 5px; /* Border radius for the text */
            z-index: 2; /* Ensure the text appears above other elements */
            white-space: nowrap; /* Prevent text from wrapping */
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
       

        <div class="navbar-icon-container" data-text="Go To Home Page ">
            <a href="<?php echo URLROOT; ?>/pages/index"  >
            <img src="<?php echo URLROOT; ?>/public/images/home.png" alt="back" class="navbar-icon">
       </a>
        </div>
    </div>
    <div class="navbar-logo-container">
        <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
    </div>
</div>

<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
</script>
    <section class="form">
        <div class="center">
    <h2></br>CCM Registration Form</h2>
    <form action="<?php echo URLROOT; ?>/admin/addAdminCredentialsccm" method="POST">
    <div class="text-field">
        <label for="admin_username">Username:</label>
        <input type="text" id="admin_username" name="admin_username" required>
    </div>
    <div class="error-message" id="username_exists_err"><?php echo isset($data['errors']['username_exists_err']) ? $data['errors']['username_exists_err'] : ''; ?></div>

    <div class="text-field">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
</div>
<div class="error-message" id="email-error"><?php echo isset($data['errors']['email_err']) ? $data['errors']['email_err'] : ''; ?></div>
<div class="error-message" id="email_exists_err"><?php echo isset($data['errors']['email_exists_err']) ? $data['errors']['email_exists_err'] : ''; ?></div>

<div class="text-field">
                        <div class="typeselect-container">
                            <select class="productstatusInput" name="collectioncenter"  onchange="updateInput(this)">
                            <option value="" selected disabled></option>

                            <option style="color:white;" value="Kadawatha">Kadawatha Keells collection center</option>

                                <option style="color:white;" value="Thambuththegama">Thambuththegama Keells collection center</option>
                                <option style="color:white;" value="Sooriyawewa">Sooriyawewa Keells collection center</option>
                                <option style="color:white;" value="Nuwara-eliya">Nuwara-eliya Keells collection center</option>
                                <option style="color:white;" value="Jaffna">Jaffna Keells collection center</option>
                                <option style="color:white;" value=" Sigiriya "> Sigiriya Keells collection center</option>
                                <option style="color:white;" value="Bandarawela">Bandarawela Keells collection center</option>
                                <option style="color:white;" value="Puttlam ">Puttlam  Keells collection center</option>


                            </select>
                            <input name="collectioncenter" id="collectioncenter" type="text" required>
                            <span></span>
                            <label>Select Your Collection Center</label>
                        </div>
                    </div>
   
    <div class="text-field">
        <label for="admin_password">Password:</label>
        <input type="password" id="admin_password" name="admin_password" required>
    </div>

    <div class="text-field">
    <label>Confirm Password</label>
        <input type="password" name="admin_cpassword" id="admin_cpassword" required>
        <span></span>
      
    </div>
    <div class="error-message" id="cpassword-error"><?php echo isset($data['errors']['cpassword_err']) ? $data['errors']['cpassword_err'] : ''; ?></div>
    <div class="error-message" id="password_length_err"><?php echo isset($data['errors']['password_length_err']) ? $data['errors']['password_length_err'] : ''; ?></div>


    <input type="submit" value="Register">

    <div class="error-message" id="fields-error"><?php echo isset($data['errors']['fields_err']) ? $data['errors']['fields_err'] : ''; ?></div>
</form>

<script> function updateInput(select) {
    var selectedOption = select.options[select.selectedIndex].text;
    // Set the value of the province input field directly
    document.getElementById("collectioncenter").value = selectedOption;
    // Reset the dropdown to show the placeholder option
    select.value = ''; // Reset to blank option
}
</script>

</body>
</html>

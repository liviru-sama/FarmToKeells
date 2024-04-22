<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>ccm/place_salesorder.css">
        <script src="<?php echo JS;?>register.js"></script>
        <title><?php echo SITENAME;?></title>
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
                height: 60px; /* Fixed height for navbar */
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

        .center{
        top:62%;}
    </style>
    </head>
    <body>

    <div class="navbar">
    <div class="navbar-icons">
        <div class="navbar-icon-container" data-text="Go Back">
            <a href="<?php echo URLROOT; ?>/pages/index.php" id="backButton" >
                <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
            </a>
        </div>
       
    </div>
    <div class="navbar-logo-container">
        <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
    </div>
</div>

        
    <section class="form">
        <div class="center">
            <h1>Farmer Registration</h1>
            <form action="<?php echo URLROOT; ?>/users/register" method="post" >
                <div class="text-field">
                    <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>" required>
                    <span></span>
                    <label>Name</label>
                </div>
                <div class="error" id="name-error"><?php echo $data['name_err']; ?></div>
                    
                <div class="text-field">
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="error" id="username-error"><?php echo $data['username_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>" required>
                    <span></span>
                    <label>E-mail Address</label>
                </div>
                <div class="error" id="email-error"><?php echo $data['email_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="nic" id="nic" value="<?php echo $data['nic']; ?>" required>
                    <span></span>
                    <label>NIC Number</label>
                </div>
                <div class="error" id="nic-error"><?php echo $data['nic_err']; ?></div>

                <div class="text-field">
                    <input type="number" name="mobile" id="mobile" value="<?php echo $data['mobile']; ?>" required>
                    <span></span>
                    <label>Mobile Number</label>
                </div>
                <div class="error" id="mobile-error"><?php echo $data['mobile_err']; ?></div>

                <div class="text-field">
                        <div class="typeselect-container">
                            <select class="productstatusInput" name="province"  onchange="updateInput(this)">
                                
                                <option style="color:white;" value="Central">Central</option>
                                <option style="color:white;" value="Southern">Southern</option>
                                <option style="color:white;" value="Northern">Northern</option>
                                <option style="color:white;" value="Western">Western</option>
                                <option style="color:white;" value="North Western">North Western</option>
                                <option style="color:white;" value="North Central">North Central</option>
                                <option style="color:white;" value="Sabaragamuwa">Sabaragamuwa</option>
                                <option style="color:white;" value="Eastern">Eastern</option>
                                <option style="color:white;" value="Uva">Uva</option>


                            </select>
                            <input name="province" id="province" type="text" required>
                            <span></span>
                            <label>Province</label>
                        </div>
                    </div>

                <div class="text-field">
                    <input type="text" name="collectioncenter" id="collectioncenter" value="<?php echo $data['collectioncenter']; ?>" required>
                    <span></span>
                    <label>Address</label>
                </div>

               

                

                <div class="text-field">
                    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" required>
                    <span></span>
                    <label>Password</label> 
                </div>
                <div class="error" id="password-error"><?php echo $data['password_err']; ?></div>
    
                <div class="text-field">
                    <input type="password" name="cpassword" id="cpassword" value="<?php echo $data['cpassword']; ?>" required>
                    <span></span>
                    <label>Confirm Password</label>
                </div>
                <div class="error" id="cpassword-error"><?php echo $data['cpassword_err']; ?></div>

                <input type="submit" value="Register">
                <div class="login-link">
                    Already a user? <a href="<?php echo URLROOT; ?>/users/user_login">Click Here</a>
                </div>
            </form>
        </div>
    </section>

        <script> function updateInput(select) {
    var selectedOption = select.options[select.selectedIndex].text;
    // Set the value of the province input field directly
    document.getElementById("province").value = selectedOption;
    // Reset the dropdown to show the placeholder option
    select.value = ''; // Reset to blank option
}
</script>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>ccm/place_salesorder.css">
        <script src="<?php echo JS;?>resetPassword.js"></script>
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

</script>

    <section class = "form">
        <div class="center">
            
 
    <h1>Reset Password</h1>
    <br>
    <?php flash('forgot_password_success'); ?>
    <?php flash('forgot_password_error', '', 'error-class'); ?>

    <form method="post" action="<?= URLROOT; ?>/admin/resetPassword?token=<?= htmlspecialchars($data['token']) ?>">
        <input type="hidden" name="token" value="<?= htmlspecialchars($data['token']) ?>">

        <div class="text-field">
            <label for="password">New password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="error" id="password_err"><?php echo $data['password_err']; ?></div>

        <div class="text-field">
            <label for="confirm_password">Repeat password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="error" id="confirm_password_err"><?php echo $data['confirm_password_err']; ?></div>
<br><br>
        <button type="submit">Reset Password</button>
    </form>
        
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>





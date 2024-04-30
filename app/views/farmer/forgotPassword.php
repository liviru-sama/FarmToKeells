<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS;?>ccm/place_salesorder.css">
    <script src="<?php echo JS;?>login.js"></script>
    <title>Forgot Password - <?php echo SITENAME;?></title>
    <style>
    body,
    html {
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
        position: fixed;
        left: 0%;
        right: 0%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        top: 0px;
        z-index: 1;
        height: 20px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-logo {
        width: auto;
        height: 40px;
        margin-right: 30px;
    }

    .navbar-icons {
        display: flex;
        align-items: center;
    }

    .navbar-icon {
        width: 50px;
        height: auto;
        margin-left: 35px;
        box-shadow: 0 0.9rem 0.8rem rgba(0, 0, 0, 0.1);
        border-radius: 50px;
        padding: 5px;
    }

    .navbar-icon:hover {
        background: #65A534;
        transform: scale(1.08);
    }

    .navbar-icon-container {
        position: relative;
    }

    .navbar-icon-container:hover::after {
        content: attr(data-text);
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #65A534;
        color: white;
        padding: 5px;
        border-radius: 5px;
        z-index: 2;
        white-space: nowrap;
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
                <a href="<?php echo URLROOT; ?>/pages/index">
                    <img src="<?php echo URLROOT; ?>/public/images/home.png" alt="back" class="navbar-icon">
                </a>
            </div>


        </div>
        <div class="navbar-logo-container">
            <img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">
        </div>
    </div>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>

    <section class="form">
        <div class="center">

            <h1>Forgot Password</h1>
            <?php flash('forgot_password_success'); ?>
            <?php flash('forgot_password_error', '', 'error-class'); ?>
            <form method="post" action="<?= URLROOT; ?>/farmer/forgotPassword">

                <div class="text-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <button type="submit">Send</button>
            </form>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
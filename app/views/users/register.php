<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS;?>ccm/place_salesorder.css">
    <script src="<?php echo JS;?>register.js"></script>
    <title>Register - <?php echo SITENAME;?></title>
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
        height: 60px;
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

    .center {
        top: 62%;
    }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="navbar-icons">
            <div class="navbar-icon-container" data-text="Go Back">
                <a href="<?php echo URLROOT; ?>/pages/index.php" id="backButton">
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
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
    </script>
    <section class="form">
        <div class="center" style="top:85%;">
            </br>
            <h1>Farmer Registration</h1></br>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">

                


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
                        <select class="productstatusInput" name="province" onchange="updateInput(this)">
                            <option value="" selected disabled></option>

                            <option style="color:white;" value="Kadawatha">Kadawatha Keells collection center</option>

                            <option style="color:white;" value="Thambuththegama">Thambuththegama Keells collection
                                center</option>
                            <option style="color:white;" value="Sooriyawewa">Sooriyawewa Keells collection center
                            </option>
                            <option style="color:white;" value="Nuwara-eliya">Nuwara-eliya Keells collection center
                            </option>
                            <option style="color:white;" value="Jaffna">Jaffna Keells collection center</option>
                            <option style="color:white;" value=" Sigiriya "> Sigiriya Keells collection center</option>
                            <option style="color:white;" value="Bandarawela">Bandarawela Keells collection center
                            </option>
                            <option style="color:white;" value="Puttlam ">Puttlam  Keells collection center</option>


                        </select>
                        <input name="province" id="province" type="text" required>
                        <span></span>
                        <label>Select Your Nearest Collection Center</label>
                    </div>
                </div>

                <div class="text-field">
                    <input type="text" name="collectioncenter" id="collectioncenter"
                        value="<?php echo $data['collectioncenter']; ?>" required>
                    <span></span>
                    <label>Enter Your Farm Address</label>
                </div>

                <div class="text-field">
                    <input type="text" name="home" id="home" value="<?php echo $data['home']; ?>" >
                    <span></span>
                    <label>Enter Your Home Address</label>
                </div>





                <div class="text-field">
                    <input type="number" name="distance" id="distance" value="<?php echo $data['distance']; ?>" min="0"
                        step="0.01" required>
                    <span></span>
                    <label>Your Distance to The Nearest Collection Center (in km)</label>
                </div>




                <div class="text-field">
                    <input type="password" name="password" id="password" value="<?php echo $data['password']; ?>"
                        required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="error" id="password-error"><?php echo $data['password_err']; ?></div>

                <div class="text-field">
                    <input type="password" name="cpassword" id="cpassword" value="<?php echo $data['cpassword']; ?>"
                        required>
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

    <script>
    function updateInput(select) {
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
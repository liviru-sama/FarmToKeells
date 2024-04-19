<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCM Register</title>
</head>
<body>
    <h2>CCM Registration Form</h2>
    <form action="<?php echo URLROOT; ?>/ccm/addAdminCredentials" method="POST">
        <div>
            <label for="admin_username">Username:</label>
            <input type="text" id="admin_username" name="admin_username" required>
        </div>
        <div>
            <label for="admin_password">Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>

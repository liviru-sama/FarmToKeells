<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <form method="post" action="<?= URLROOT; ?>/farmer/forgotPassword">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Send</button>
    </form>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

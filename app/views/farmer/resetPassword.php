<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>

    <h1>Reset Password</h1>

    <form method="post" action="<?= URLROOT; ?>/farmer/resetPassword">
        <input type="hidden" name="token" value="<?= htmlspecialchars($data['token']) ?>">
        <label for="password">New password</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Reset Password</button>
    </form>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

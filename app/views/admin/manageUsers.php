<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>admin/manageUsers.css">

    <title><?php echo SITENAME; ?></title>
</head>
<body>

<h2>Pending Users</h2>

<?php $pendingUsers = $data['pendingUsers']; ?>
<?php if (!empty($pendingUsers)): ?>
    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($pendingUsers as $user): ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td> 
                    <!-- Add other columns as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No pending users.</p>
<?php endif; ?>

<!-- Add your additional content, scripts, or footer here -->

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

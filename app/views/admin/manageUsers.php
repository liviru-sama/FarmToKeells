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
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Province</th>
                    <th>Collection Center</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendingUsers as $user): ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->mobile; ?></td> 
                        <td><?= $user->province; ?></td>
                        <td><?= $user->collectioncenter; ?></td>
                        <td>
                            <form action="<?= URLROOT; ?>/admin/acceptUser" method="post">
                                <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                <button type="submit" name="accept">Accept</button>
                            </form>
                            <form action="<?= URLROOT; ?>/admin/rejectUser" method="post">
                                <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                <button type="submit" name="reject">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No pending users.</p>
    <?php endif; ?>

    <h2>Accepted Users</h2>

    <?php $acceptedUsers = $data['acceptedUsers']; ?>
    <?php if (!empty($acceptedUsers)): ?>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Province</th>
                    <th>Collection Center</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($acceptedUsers as $user): ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->mobile; ?></td> 
                        <td><?= $user->province; ?></td>
                        <td><?= $user->collectioncenter; ?></td>
                        <td>
                            <form action="<?= URLROOT; ?>/admin/deleteUser" method="post">
                                <input type="hidden" name="userId" value="<?= $user->id; ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No accepted users.</p>
    <?php endif; ?>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

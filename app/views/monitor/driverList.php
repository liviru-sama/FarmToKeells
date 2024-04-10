<?php require APPROOT . '/views/inc/header.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>tables.css">
        <script src="<?php echo JS;?>monitor/vehicleList.js"></script>
        <title><?= $data['title'] ?></title>
    </head>
    <body>
        <div class="container">
            <h2>Drivers</h2>
            <div class="tabs">
                <a href="<?php echo URLROOT; ?>/Monitor/addDriver">
                    <button class="tab activeTab" id="addDriver">Add Driver</button>
                </a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Date Joined</th>
                </tr>
                <?php foreach($data['drivers'] as $driver) {
                    echo "<tr class = 'clinck' onclick= \"window.location.href = '".URLROOT."/Monitor/driverInfo/".$driver->D_id."'\";>
                        <td>".$driver->D_id."</td>
                        <td>".$driver->D_name."</td>
                        <td>".$driver->D_email."</td>
                        <td>".$driver->D_contact."</td>
                        <td>".$driver->D_address."</td>
                        <td>".$driver->DateJoined."</td>
                    </tr>";
                } ?>
            </table>
        </div>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
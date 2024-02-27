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
            <h2>Vehicles</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Licence No.</th>
                    <th>Chassis No.</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Capacity</th>
                    <th>Driver</th>
                </tr>
                <?php foreach($data['vehicles'] as $vehicle) {
                    echo "<tr class = 'clink' onclick= \"window.location.href = '".URLROOT."/Monitor/vehicleInfo/".$vehicle->V_id."'\";>
                        <td>".$vehicle->V_id."</td>
                        <td>".$vehicle->License_no."</td>
                        <td>".$vehicle->chassis."</td>
                        <td>".$vehicle->vtype."</td>
                        <td>".$vehicle->model."</td>
                        <td>".$vehicle->capacity."</td>
                        <td>".$vehicle->driver."</td>
                        <td></td>
                    </tr>";
                } ?>
            </table>
        </div>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
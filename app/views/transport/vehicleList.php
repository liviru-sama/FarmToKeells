<?php
// No of the box that needs to be selected
$side = 5;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>tables.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
        <h2>Vehicles</h2>
            <div class="tabs">
                <a href="<?php echo URLROOT; ?>/Transport/addVehicle">
                    <button class="tab activeTab" id="addVehicle">Add Vehicle</button>
                </a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Licence No.</th>
                    <th>Chassis No.</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Capacity</th>
                    <th>Active</th>
                    <th>Driver</th>
                </tr>
                <?php foreach($data['vehicles'] as $vehicle) {
                    echo "<tr class = 'clinck' onclick= \"window.location.href = '".URLROOT."/Transport/vehicleInfo/".$vehicle->V_id."'\";>
                        <td>".$vehicle->V_id."</td>
                        <td>".$vehicle->License_no."</td>
                        <td>".$vehicle->chassis."</td>
                        <td>".$vehicle->vtype."</td>
                        <td>".$vehicle->model."</td>
                        <td>".$vehicle->capacity."</td>
                        <td>".$vehicle->activeState."</td>
                        <td>".$vehicle->driver."</td>
                    </tr>";
                } ?>
            </table>
        </div>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
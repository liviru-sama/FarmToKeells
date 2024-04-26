<?php
// No of the box that needs to be selected
$side = 4;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>tables.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
        <h2>Drivers</h2>
            <div class="tabs">
                <a href="<?php echo URLROOT; ?>/Transport/addDriver">
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
                    echo "<tr class = 'clinck' onclick= \"window.location.href = '".URLROOT."/Transport/driverInfo/".$driver->D_id."'\";>
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

<!-- Footer -->
<?php include "inc/bottom.php" ?>
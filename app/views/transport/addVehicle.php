<?php
// No of the box that needs to be selected
$side = 5;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?= CSS ?>forms.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
        <h2>Add New Vehicle</h2>
                <form action="<?= URLROOT ?>/Transport/addVehicle" method="post">
                        
                    <div class="text-field">
                        <input type="text" name="License_no" id="License_no" required>
                        <span></span>
                         <label>License No.</label>
                    </div>
                    <div class="error" id="License_no-error"><?php echo $data['errors']['License_no_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="chassis" id="chassis" required>
                        <span></span>
                        <label>Chassis No.</label>
                    </div>
                    <div class="error" id="chassis-error"><?php echo $data['errors']['chassis_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="vtype" id="vtype" required>
                        <span></span>
                        <label>Vehicle Type</label>
                    </div>
                    <div class="error" id="vtype-error"><?php echo $data['errors']['vtype_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="model" id="model" required>
                        <span></span>
                        <label>Vehicle Model</label>
                    </div>
                    <div class="error" id="model-error"><?php echo $data['errors']['model_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="capacity" id="capacity" required>
                        <span></span>
                        <label>Vehicle Capacity (kg)</label>
                    </div>
                    <div class="error" id="capacity-error"><?php echo $data['errors']['capacity_err']; ?></div>

                    <div class="text-field">
                        <select name="D_id" id="D_id" required>
                            <option value="">Assign Driver</option>
                            <?php
                                foreach ($data['Drivers'] as $driver) {
                                    echo "<option value=".$driver->D_id.">".$driver->D_name."</option>";
                                }
                            ?>
                        </select>
                        <span></span>
                        <label>Driver</label>
                    </div>
                    <div class="error" id="D_id-error"><?php echo $data['errors']['D_id_err']; ?></div>

                    <input type="submit" value="Add Vehicle">
                </form>
        </div>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
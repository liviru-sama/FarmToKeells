<?php
// No of the box that needs to be selected
$side = 5;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>forms.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
            <div class="editsave">
                <h1>Vehicle Information - <?= $data['vehicle']->V_id ?></h1>
                <div class="editdelete">
                    <button class="edit" id="edit">Edit</button>
                    <a href="<?php echo URLROOT; ?>/Transport/deleteVehicle/<?= $data['vehicle']->V_id ?>">
                        <button class="edit delete" id="delete">Delete</button>
                    </a>
                </div>
            </div>
                <form id="vInfo" action="<?= URLROOT ?>/Transport/editVehicle" method="post">
                    <input type="hidden" name="V_id" id="V_id" value="<?= $data['vehicle']->V_id ?>">
                    <div class="text-field">
                        <input type="text" name="License_no" id="License_no" value="<?= $data['vehicle']->License_no ?>" required disabled>
                        <span></span>
                         <label>License No.</label>
                    </div>
                    <div class="error" id="License_no-error"><?php echo $data['errors']['License_no_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="chassis" id="chassis" value="<?= $data['vehicle']->chassis ?>" required disabled>
                        <span></span>
                        <label>Chassis No.</label>
                    </div>
                    <div class="error" id="chassis-error"><?php echo $data['errors']['chassis_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="vtype" id="vtype" value="<?= $data['vehicle']->vtype ?>" required disabled>
                        <span></span>
                        <label>Vehicle Type</label>
                    </div>
                    <div class="error" id="vtype-error"><?php echo $data['errors']['vtype_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="model" id="model" value="<?= $data['vehicle']->model ?>" required disabled>
                        <span></span>
                        <label>Vehicle Model</label>
                    </div>
                    <div class="error" id="model-error"><?php echo $data['errors']['model_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="capacity" id="capacity" value="<?= $data['vehicle']->capacity ?>" required disabled>
                        <span></span>
                        <label>Vehicle Capacity (kg)</label>
                    </div>
                    <div class="error" id="capacity-error"><?php echo $data['errors']['capacity_err']; ?></div>

                    <div class="text-field">
                        <select name="D_id" id="D_id" required disabled>
                            <option value="<?= $data['vehicle']->D_id ?>"><?= $data['vehicle']->driver ?></option>
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
                </form>
        </div>


<!-- JS -->
<script src="<?php echo JS;?>transport/Vinfo.js"></script>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
<?php
// No of the box that needs to be selected
$side = 2;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>forms.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
            <div class="editsave">
                <h1>Request Information - <?= $data['torder']->order_id ?></h1>
            </div>
                <form id="vInfo" action="<?= URLROOT ?>/Transport/torderInfo/<?= $data['torder']->order_id ?>" method="post">
                    <div class="text-field">
                        <select name="D_id" id="D_id" required>
                            <option value="<?= $data['torder']->D_id ?>"><?= $data['torder']->D_name ?></option>
                            <?php
                                foreach ($data['Drivers'] as $driver) {
                                    echo "<option value=".$driver->D_id.">".$driver->D_name."</option>";
                                }
                            ?>
                        </select>
                        <span></span>
                        <label>Select New Driver</label>
                    </div>

                    <input type="submit" value="Replace Driver">
                </form>
        </div>


<!-- JS -->
<script src="<?php echo JS;?>transport/Vinfo.js"></script>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
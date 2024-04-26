<?php
// No of the box that needs to be selected
$side = 2;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>tables.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
        <h2>Transport Orders</h2>
        <table>
            <tr>
                <th>#</th>
                <!-- <th>Date</th> -->
                <th>User</th>
                <th>Product</th>
                <th>Vehicle</th>
                <th>Driver</th>
                <th style="width: 30%;">Status</th>
            </tr>
            <?php foreach($data['torders'] as $torder) {
                echo "<tr>
                    <td>".$torder->order_id."</td>
                    <td>".$torder->user."</td>
                    <td>".$torder->product_name."</td>
                    <td>".$torder->license."</td>
                    <td>".$torder->D_name."</td>
                    <td><div class='status'>
                    <a href='".URLROOT."/transport/statusminus/".$torder->order_id."'><button>&lt;</button></a>
                    ".$torder->status_name."
                    <a href='".URLROOT."/transport/statusadd/".$torder->order_id."'><button>&gt;</button></a>
                    </div></td>
                </tr>";
            } ?>
            
        </table>
        </div>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
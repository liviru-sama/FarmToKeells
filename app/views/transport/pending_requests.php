<?php
// No of the box that needs to be selected
$side = 1;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>tables.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
            <h2>Collection Requests</h2>
            <div class="tabs">
                <a href="<?php echo URLROOT; ?>/transport/pending_requests">
                    <button class="tab activeTab" id="pendingTab">Pending</button>
                </a>
                <a href="<?php echo URLROOT; ?>/transport/cancelled_requests">
                    <button class="tab" id="cancelledTab">Rejected</button>
                </a>
            </div>
            <table>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Window Start</th>
                    <th>Window End</th>
                </tr>
                <?php foreach($data['activeRequests'] as $request) {
                    echo "<tr class = 'clinck' onclick= \"window.location.href = '".URLROOT."/Transport/requestInfo/".$request->req_id."'\";>
                        <td>".$request->order_id."</td>
                        <td>".$request->user."</td>
                        <td>".$request->product_name."</td>
                        <td>".$request->quantity."</td>
                        <td>".$request->startdate."</td>
                        <td>".$request->enddate."</td>
                    </tr>";
                } ?>
                
            </table>
        </div>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
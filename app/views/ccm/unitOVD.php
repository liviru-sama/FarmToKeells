<?php
$tab = 6;

include "topsides.php";
?>

<a href="<?= URLROOT; ?>/ccm/unitOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;TRANSPORT UNIT OVERVIEW</h5></a>

    <a href="<?= URLROOT; ?>/ccm/unitOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); padding: 2px;">TRANSPORT UNIT OVERVIEW REPORT</h5>
            </a>
        
            <main class="table">
            <section class="table_body">

    <div class="reportInfo" id="reportInfo">
        <table>
            <tr>
                <th>From</th>
                <td><?= htmlspecialchars($data['startDate']); ?></td>
            </tr>
            <tr>
                <th>To</th>
                <td><?= htmlspecialchars($data['endDate']); ?></td>
            </tr>
        </table>
    </div>

    <div style="display:flex; flex-direction:column; justify-content:center; align-content:center; margin: 2rem auto 4rem; gap:2rem;">
        <div style="width:80%; display:flex; align-items: center; justify-content:center; gap:2rem; margin:0 auto;">
        <table class="data" style = "width:100%; font-weight:normal; justify-content:left;">
            <?php
            foreach ($data['allVehicles'] as $veh) {
                ($veh->active == 1) ? $status = "Active" : $status = "Inactive";
                echo "<tr><td style='margin-top:2rem; width:100%; justify-content:left; text-align:left; float:left;'>".$veh->V_id." : ".$veh->License_no." (".$status.") </td></tr>";
                echo "<tr><td style='padding-left:2rem; font-weight:normal; justify-content:left; text-align:left; float:left;'>Chassis : ".$veh->chassis."</td></tr>";
                echo "<tr><td style='padding-left:2rem; font-weight:normal; justify-content:left; text-align:left; float:left;'>Model : ".$veh->model."</td></tr>";
                echo "<tr><td style='padding-left:2rem; font-weight:normal; justify-content:left; text-align:left; float:left;'>Vehicle Type : ".$veh->vtype." (".$veh->capacity." kg)</td></tr>";
                echo "<tr><td style='padding-left:2rem; font-weight:normal; justify-content:left; text-align:left; float:left;'>No. of Orders Completed : ".$veh->jobsDone."</td></tr>";
                echo "<tr><td style='padding-left:2rem; font-weight:normal; justify-content:left; text-align:left; float:left;'>Total time spent on deliveries : ".$veh->time." mins</td></tr>";
            }
            
            ?>
        </table>
        </div>
    </div>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

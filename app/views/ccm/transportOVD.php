<?php
$tab = 5;

include "topsides.php";
?>
<a href="<?= URLROOT; ?>/ccm/transportOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;TRANSPORT ORDER OVERVIEW</h5></a>

    <a href="<?= URLROOT; ?>/ccm/transportOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); padding: 2px;">TRANSPORT ORDER OVERVIEW REPORT</h5>
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
        <div style="display:flex; justify-content:center; margin: 2rem auto 3rem; gap:4rem;">
        <p>No. of Transport Orders : <?= $data['allTorders']->count; ?></p>
        </div>
        <div style="width:44vw; margin:0 auto; font-size: 0.6rem;">
            <table>
                <tr style="height: 1vw; margin:0 auto; width:min-content; padding: 0;">
                    <td style="width: 1vw; background-color:#94BF36"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Pending Transports</td>
                    <td style="width: 1vw; background-color:#76A62E"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Out for Pickup</td>.
                    <td style="width: 1vw; background-color:#638C26"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Collected Transports</td>
                    <td style="width: 1vw; background-color:#375915"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Completed Orders</td>
                </tr>
            </table>
        </div>
        <div style="width:80%; display:flex; align-items: center; justify-content:center; gap:2rem; margin:0 auto;">
        <table>
            <tr style = "width:100%;">
            <?php
                echo ($data['pendingTorders']->count != 0) ? "<td title='Pending Orders' style='background-color: #94BF36; width: ".$data['pendingTorders']->perc."%'>".$data['pendingTorders']->count."</td>" : "";
                echo ($data['pickupTorders']->count != 0) ? "<td title='Pickup Orders' style='background-color: #76A62E; width: ".$data['pickupTorders']->perc."%'>".$data['pickupTorders']->count."</td>" : "";
                echo ($data['collectedTorders']->count != 0) ? "<td title='Collected Orders' style='background-color: #638C26; width: ".$data['collectedTorders']->perc."%'>".$data['collectedTorders']->count."</td>" : "";
                echo ($data['completedTorders']->count != 0) ? "<td title='Completed Orders' style='background-color: #375915; width: ".$data['completedTorders']->perc."%'>".$data['completedTorders']->count."</td>" : "";
            ?>
            </tr>
        </table>
        </div>
    </div>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

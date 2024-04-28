<?php
$tab = 4;

include "topsides.php";
?>
<a href="<?= URLROOT; ?>/ccm/salesOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;SALES ORDER OVERVIEW</h5></a>

    <a href="<?= URLROOT; ?>/ccm/salesOVD" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); padding: 2px;">SALES ORDER OVERVIEW REPORT</h5>
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
        <p>No. of Sales Orders : <?= $data['allSorders']->count; ?></p>
        </div>
        <div style="width:44vw; margin:0 auto; font-size: 0.6rem;">
            <table>
                <tr style="height: 1vw; margin:0 auto; width:min-content; padding: 0;">
                    <td style="width: 1vw; background-color:#F5C749"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Pending Orders</td>
                    <td style="width: 1vw; background-color:#4AB0F5"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Approved Orders</td>.
                    <td style="width: 1vw; background-color:#F54949"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Rejected Orders</td>
                    <td style="width: 1vw; background-color:#65A534"></td>
                    <td style="font-weight:normal; width: 10vw; padding:0;">Completed Orders</td>
                </tr>
            </table>
        </div>
        <div style="width:80%; display:flex; align-items: center; justify-content:center; gap:2rem; margin:0 auto;">
        <table>
            <tr style = "width:100%;">
            <?php
                echo ($data['pendingSorders']->count != 0) ? "<td title='Pending Orders' style='background-color: #F5C749; width: ".$data['pendingSorders']->perc."%'>".$data['pendingSorders']->count."</td>" : "";
                echo ($data['approvedSorders']->count != 0) ? "<td title='Approved Orders' style='background-color: #4AB0F5; width: ".$data['approvedSorders']->perc."%'>".$data['approvedSorders']->count."</td>" : "";
                echo ($data['rejectedSorders']->count != 0) ? "<td title='Rejected Orders' style='background-color: #F54949; width: ".$data['rejectedSorders']->perc."%'>".$data['rejectedSorders']->count."</td>" : "";
                echo ($data['completedSorders']->count != 0) ? "<td title='Completed Orders' style='background-color: #65A534; width: ".$data['completedSorders']->perc."%'>".$data['completedSorders']->count."</td>" : "";
            ?>
            </tr>
        </table>
        </div>
    </div>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

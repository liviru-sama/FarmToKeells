<?php
$tab = 3;

include "topsides.php";
?>
<a href="<?php echo URLROOT; ?>/ccm/purchaseOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;PURCHASE ORDER OVERVIEW</h5></a>

    <a href="<?php echo URLROOT; ?>/ccm/purchaseOVD" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); padding: 2px;">PURCHASE ORDER OVERVIEW REPORT</h5>
            </a>
        
            <main class="table">
            <section class="table_body">

    <div class="reportInfo" id="reportInfo">
        <table>
            <tr>
                <th>From</th>
                <td><?php echo htmlspecialchars($data['startDate']); ?></td>
            </tr>
            <tr>
                <th>To</th>
                <td><?php echo htmlspecialchars($data['endDate']); ?></td>
            </tr>
        </table>
    </div>
    <div style="display:flex; flex-direction:column; justify-content:center; align-content:center; margin: 2rem auto 4rem; gap:2rem;">
        <div style="display:flex; justify-content:center; margin: 2rem auto 3rem; gap:4rem;">
        <p>No. of Purchase Orders : <?php echo $data['allPorders']->allCount; ?></p>
        <p>No. of Pending Purchase Orders : <?php echo $data['pendingPorders']->pendingCount; ?></p>
        </div>
        <div style="width:80%; display:flex; align-items: center; justify-content:center; gap:2rem; margin:0 auto;">
        <table>
            <tr style = "width:100%;">
                <td style="background-color: #65A534; width: <?php echo $data['perc']; ?>%"><?php echo $data['completed']; ?></td>
                <td style="background-color: #cccccc;"><?php echo $data['allPorders']->allCount - $data['completed'];?></td>
            </tr>
        </table>
        </div>
    </div>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

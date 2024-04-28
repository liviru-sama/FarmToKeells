<?php
$tab = 4;

include "topsides.php";
?>
<a href="<?php echo URLROOT; ?>/ccm/salesOV" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;SALES ORDER OVERVIEW</h5></a>

    <a href="<?php echo URLROOT; ?>/ccm/salesOVD" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); padding: 2px;">SALES ORDER OVERVIEW REPORT</h5>
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
        <p>No. of Sales Orders : <?php echo $data['allCount']; ?></p>
        </div>
        <div style="width:80%; display:flex; align-items: center; justify-content:center; gap:2rem; margin:0 auto;">
        <table>
            <tr style = "width:100%;">
                <td style="background-color: #F5C749; width: <?php echo $data['allSorders'][2]->perc; ?>%"><?php echo $data['allSorders'][2]->count; ?></td>
                <td style="background-color: #4AB0F5; width: <?php echo $data['allSorders'][0]->perc; ?>%"><?php echo $data['allSorders'][0]->count; ?></td>
                <td style="background-color: #F54949; width: <?php echo $data['allSorders'][3]->perc; ?>%"><?php echo $data['allSorders'][3]->count; ?></td>
                <td style="background-color: #65A534;"><?php echo $data['allSorders'][1]->count; ?></td>
            </tr>
        </table>
        </div>
    </div>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

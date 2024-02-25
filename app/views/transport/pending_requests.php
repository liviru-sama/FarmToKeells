<?php require APPROOT . '/views/inc/header.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS;?>tables.css">
        <title><?= $data['title'] ?></title>
    </head>
    <body>
        <div class="container">
            <h2>Collection Requests</h2>
            <div class="tabs">
                <a href="<?php echo URLROOT; ?>/transport/pending_requests">
                    <button class="tab activeTab" id="pendingTab">Pending</button>
                </a>
                <a href="<?php echo URLROOT; ?>/transport/cancelled_requests">
                    <button class="tab" id="cancelledTab">Cancelled</button>
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
                    <th>Action</th>
                </tr>
                <?php foreach($data['activeRequests'] as $request) {
                    echo "<tr>
                        <td>".$request->req_id."</td>
                        <td>".$request->user."</td>
                        <td>".$request->product."</td>
                        <td>".$request->quantity."</td>
                        <td>".$request->startdate."</td>
                        <td>".$request->enddate."</td>
                        <td></td>
                    </tr>";
                } ?>
                
            </table>
        </div>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
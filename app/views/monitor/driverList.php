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
            <h2>Drivers</h2>
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Date Joined</th>
                </tr>
                <!-- <?php foreach($data['activeRequests'] as $request) {
                    echo "<tr>
                        <td>".$request->req_id."</td>
                        <td>".$request->user."</td>
                        <td>".$request->product."</td>
                        <td>".$request->quantity."</td>
                        <td>".$request->startdate."</td>
                        <td>".$request->enddate."</td>
                        <td></td>
                    </tr>";
                } ?> -->
                
            </table>
        </div>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
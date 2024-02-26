<?php require APPROOT . '/views/inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/view_inventory.css">

</head>

<body>
    <section class="header">
       
        <h4>SALES ORDERS
        
        
        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                            <th>SALES ORDER ID</th>
                            <th>PRODUCT </th>
                            <th>PRODUCT TYPE</th>
                            <th>NEEDED QUANTITY(kgs) </th>
                            <th>EXPECTED SUPPLY DATE</th>
                            <th>ADDRESS</th>
                        
                        

                             </tr>
                        </thead>
                        <tbody>
                     
                            
                                

   
    <?php while ($row = mysqli_fetch_assoc($data['salesorders'] )) { ?>
        <tr>
            <td><?php echo $row['order_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['address'] ?></td>
        </tr>
    <?php } ?>


                        </tbody>
                    </table>
                </form>
            </section>
        </main>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

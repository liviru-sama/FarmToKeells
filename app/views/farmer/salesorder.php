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
       
        <h4>SALES ORDERS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesorder">+ Add sales order</a>

        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                            <th>sales order ID</th>
                        <th>Product </th>
                        <th>product type</th>
                        <th>needed quantity(kgs) </th>
                        <th>expected supply date</th>
                        <th>address</th>
                        
                        <th>edit </th>
                        <th>delete </th>

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
            <td><a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row['order_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
            <td><a href="<?php echo URLROOT; ?>/farmer/delete_salesorder?id=<?php echo $row['order_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></a></td>
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

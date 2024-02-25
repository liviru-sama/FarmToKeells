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
       
        <h4>PRODUCT INVENTORY
        
        <a class="button" href="<?php echo URLROOT; ?>/ccm/add_product">+ Add Product</a>

        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT NAME </th>
                                <th>PRODUCT TYPE</th>
                                <th>PRESENT QUANTITY(IN kgs) </th>
                                <th>PRICE</th>

                                <th>EDIT</th>
                                <th>DELETE</th>
                             </tr>
                        </thead>
                        <tbody>
                     
                            
                                

   
    <?php while ($row = mysqli_fetch_assoc($data['products'] )) { ?>
        <tr>
            <td><?php echo $row['product_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><a href="<?php echo URLROOT; ?>/ccm/edit_product?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
            <td><a href="<?php echo URLROOT; ?>/ccm/delete_product?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></a></td>
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

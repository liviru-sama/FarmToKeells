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
       
        <h4>LET THEM KNOW YOUR AVAILABLE PRODUCTS!!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesordercommon?user_id=<?php echo $_SESSION['user_id']; ?>">+ADD NEW</a>

        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
</br>        
                        <thead>
                        <a style="text-align:right;" href="<?php echo URLROOT; ?>/farmer/cardsalesorder?user_id=<?php echo $_SESSION['user_id']; ?>">Table View</a>

                            <tr>
                            <th>Product image </th>
                            <th>sales order ID</th>
                        <th>Product </th>
                        <th>product type</th>
                        <th>needed quantity(kgs) </th>
                        <th>price </th>
                        <th>expected supply date</th>
                        <th>address</th>
                        <th>status</th>

                        <th>edit </th>
                        <th>delete </th>

                             </tr>
                        </thead>
                        <tbody>
                     
                            
                                

   
                        <?php 
// Check if data is not empty and is an array
if (!empty($data['salesorders']) && is_array($data['salesorders'])) {
    foreach ($data['salesorders'] as $row) {
?>
        <tr>

            <td><img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" style="width: 50px;"></td>
            <td><?php echo $row->order_id ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->type ?></td>
            <td><?php echo $row->quantity ?></td>
            <td><?php echo $row->price ?></td>
            <td><?php echo $row->date ?></td>
            <td><?php echo $row->address ?></td>
            <td><?php echo $row->status ?></td>

            <td><a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
            <td><a href="<?php echo URLROOT; ?>/farmer/delete_salesorder?id=<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png"></a></td>
        </tr>
<?php 
    }
} else {
    // Handle the case where no sales orders are found
    echo "<tr><td colspan='8'>No sales orders found.</td></tr>";
}
?>



                        </tbody>
                    </table>
                </form>
            </section>
        </main>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("UPDATE purchaseorder SET type=?, quantity=?, date=? WHERE name=?");
    $stmt->bind_param("ssss", $type, $quantity, $date, $name);

    if ($stmt->execute()) {
        echo "<h2>Data updated successfully</h2>";
       
    } else {
        echo "<h2>Error: " . $stmt->error . "</h2>";
    }
  //  if(isset($_POST['place'])) {
        // This code will be executed when the button is clicked
   //     header("Location:admin-view-purchaseorder");
   //     exit();
    }

?>
<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin view purchase order</title>
    <link rel="stylesheet" href="<?php echo CSS;?>admin-view-purchaseorder.css">
    
</head>
<body>
    <section class="header">
        <nav>
            
        <img src="<?php echo URLROOT; ?>/public/images/logoBlack.png" ></a>
            <div class="nav-links">
                <ul>
                    <li><a href="farmer-profile.php">Account</a></li>
                    <li><a href="inquiries-support.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <h4>Purchase orders</h4>
        <main class="table">
        <section class="table_header">
       

        </section>
        <section class="table_body">
            <form method="post">
             <table>
                <thead>
                    <tr>
                        <th>purchase order ID</th>
                        <th>Product </th>
                        <th>product type</th>
                        <th>needed quantity(kgs) </th>
                        <th>expected supply date</th>
                        <th>status</th>
                        <th>edit </th>
                        <th>delete </th>



                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "config.php";
                    

                        $sql = "select * from purchaseorder";

                        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        

                    ?>
                    <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
                    <tr>
                        <td><?php echo $row['purchase_id']  ?></td>
                        <td><?php echo $row['name']  ?></td>
                        <td>
                        <?php echo $row['type']  ?></td>
                        <td><?php echo $row['quantity']  ?></td>
                        <td><?php echo $row['date']  ?></td>
                        <td>completed</td>

                        <td> <a href="admin-edit-purchaseorder.php"><img src="<?php echo URLROOT; ?>/public/images/wasri/edit.png" ></a>
                        <td> <a href="delete-purchaseorder.php?id=<?php echo $row['purchase_id']; ?>"><img src="delete.png"></button></td>

                    </tr>
                   <?php 
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


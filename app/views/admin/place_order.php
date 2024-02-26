<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("INSERT INTO purchaseorder (name, type, quantity, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $type, $quantity, $date);

    if ($stmt->execute()) {
        echo "<h2>Data received successfully</h2>";
        header("Location: admin-view-purchaseorder.php");
        exit();
    } else {
        echo "<h2>Error: " . $stmt->error . "</h2>";
    }
    
// if(isset($_POST['next'])) {
//     // This code will be executed when the button is clicked
    
//     exit();
// }

}
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Place Order</title>
    <link rel="stylesheet" href="<?php echo CSS;?>admin-place-order.css">
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.php"><img src="<?php echo URLROOT; ?>/public/images/logoBlack.png" ></a>
            <div class="nav-links">
                <ul>
                    <li><a href="farmer-profile.php">Account</a></li>
                    <li><a href="inquiries-support.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <section class="form">
        <div class="center">
            <h1>Place Purchase Order</h1>
            <form method="post" action="" id="myForm">
                <div class="text-field">
                    <input type="text" name="name" required>
                    <span></span>
                    <label> Product</label>
                </div>
                <div class="text-field">
                    <input type="text" name="type" required>
                    <span></span>
                    <label> Product Type</label>
                </div>
                <div class="text-field">
                    <input type="number" name="quantity" required>
                    <span></span>
                    <label> Needed Quantity (In kgs)</label>
                </div>
                <div class="text-field">
                    <input type="date" name="date" required>
                    <span></span>
                    <label> Expected Supply Date</label>
                </div>
                <input type="submit" value="Reset" onclick="resetForm()">
                <a href="admin-view-purchaseorder.php"><input type="submit" value="Place"> </a>
            </form>
        </div>
    </section>
</body>

</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>

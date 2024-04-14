<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/add_product.css">
    <style>
        /* CSS for styling the iframe */
        #productSelectionFrame {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            z-index: 9999;
            display: none; /* Initially hide the iframe */
            width: 80%; /* Adjust width as needed */
            height: 80%; /* Adjust height as needed */
        }
    </style>
</head>

<body>
    <section class="header"></section>
    <section class="form">
        <div class="center">
            <h1>Add Sales order</h1>
            <form action='<?php echo URLROOT; ?>/farmer/add_salesorder?purchase_id=<?php echo $data['purchase_id']; ?>' method="post" id="myForm">
    
            <input type="hidden" name="user_id" value="<?php echo isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?>">

                <!-- Hidden input field to store the purchase ID -->
                <input type="hidden" name="purchase_id" value="<?php echo isset($data['purchase_id']) ? $data['purchase_id'] : ''; ?>">

                <input type="hidden" name="image" id="productImage" value="<?php echo isset($data['image']) ? $data['image'] : ''; ?>">

                <input type="hidden" name="status" id="status" value="Pending Approval">

                <div class="text-field">
  <input name='name' id="productName" type="text" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" readonly>
  <span></span>
  <label> Product</label>
</div>


<div class="text-field">
    <div class="select-container">
        <select class="statusInput" name="category" onchange="updateInput(this)">
            <option value="hillcountry">Hill Country</option>
            <option value="organic">Organic</option>
        </select>
        <input name="type" id="categoryInput" type="text" required>
        <span></span>
        <label> Category</label>
    </div>
</div>

<script>
    function updateInput(select) {
        var selectedOption = select.options[select.selectedIndex].text;
        document.getElementById("categoryInput").value = selectedOption;
        // Reset the dropdown to show the placeholder option
        select.value = ''; // Reset to blank option
    }
</script>









                <div class="text-field">
                    <input name="date" id="salesOrderDate" type="date" required>
                    <span></span>
                    <label> Date</label>
                </div>
                <div class="text-field">
                    <input name="quantity" type="number" required>
                    <span></span>
                    <label> Stock</label>
                </div>
                <div class="text-field">
                    <input name="price" type="number" required>
                    <span></span>
                    <label> Price per kg</label>
                </div>
                <div class="text-field">
                    <input name="address" type="text" required>
                    <span></span>
                    <label> Address</label>
                </div>
                <input type="submit" value="Reset" onclick="resetForm()">
                <input type="submit" value="Add">
            </form>
        </div>
    </section>

    <!-- Product selection iframe -->

   <script>


    // JavaScript function to toggle the visibility of the dropdown
   
    // Close the dropdown if the user clicks outside of it
   

    // Get the sales order date input element
    var salesOrderDateInput = document.getElementById('salesOrderDate');

    // Get the current date
    var currentDate = new Date().toISOString().split('T')[0];

    // Set the min attribute to the current date
    salesOrderDateInput.setAttribute('min', currentDate);

    // Function to reset the form
    function resetForm() {
        document.getElementById('myForm').reset();
    }
</script>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

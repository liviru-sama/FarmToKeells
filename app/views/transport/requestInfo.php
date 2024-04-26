<?php
// No of the box that needs to be selected
$side = 1;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>forms.css">

<!-- Page content starts here with midbox -->
        <div class="midbox">
        <h2>Manage Request</h2>

        <p><b>Order ID : </b><?= $data['request']->order_id ?></p>
        <p><b>Name : </b><?= $data['request']->username ?></p>
        <p><b>Product : </b><?= $data['request']->product_name ?></p>
        <p><b>Quantity : </b><?= $data['request']->quantity ?></p>
        <p><b>Window : </b><?= $data['request']->startdate ?> - <?= $data['request']->enddate ?></p>
        <p><b>Notes : </b><?= $data['request']->notes ?></p>
        <p><b>Estimated Duration : </b><?= $data['request']->duration ?></p>

        <br>

        <div class="AR">
            <button class="edit" id="accept">Accept</button>
            <a href="<?= URLROOT ?>/Transport/reject_request/<?= $data['request']->req_id ?>"><button class="edit delete" id="reject">Reject</button></a>
        </div>

        <form action="<?= URLROOT ?>/Transport/accept_request" method="POST">
            <input type="hidden" name="req_id" id="req_id" value="<?= $data['request']->req_id ?>">
            <input type="hidden" name="order_id" id="order_id" value="<?= $data['request']->order_id ?>">
            <input type="hidden" name="slots" id="slots" value="<?= $data['slots'] ?>">

            <div class="text-field">
                <select name="date" id="date" onchange="updateTransport()" required disabled>
                    <?php
                    foreach ($data['dates'] as $date) {
                        echo "<option value='$date'>".$date."</option>";
                    }
                    ?>
                </select>
                <span></span>
                <label>Date</label>
            </div>
            <div class="error" id="date-error"><?= $data['errors']['date_err']; ?></div>

            <div class="text-field">
                <select name="V_id" id="V_id" required disabled>
                    <option value=""></option>
                </select>
                <span></span>
                <label>Transport Unit</label>
            </div>
            <div class="error" id="V_id-error"><?= $data['errors']['V_id_err']; ?></div>
            
            <input type="submit" id="assign" value="Move To Orders" disabled>
        </form>
        </div>

<!-- JS -->
<script src="<?php echo JS;?>transport/Rinfo.js"></script>
<script>
    function updateTransport() {
    var dateSelect = document.getElementById("date");
    var date = dateSelect.value;
    var transports = document.getElementById("V_id");
    var oid = <?= $data['request']->order_id ?>;
    
    // Make an AJAX request to fetch data from <?= URLROOT ?>/Transport/getUnits
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "<?= URLROOT ?>/Transport/getUnits/" + date + "/" + oid, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            // Parse the JSON response
            var units = JSON.parse(xhr.responseText);
            
            // Clear existing options
            transports.innerHTML = '';
            
            // Populate select with retrieved data
            for (var i = 0; i < units.length; i++) {
                var option = document.createElement('option');
                option.value = units[i].V_id;
                option.textContent = units[i].License_no;
                transports.appendChild(option);
            }
        }
    };
    xhr.send();
}

</script>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
<!-- confirmation_dialog.php -->

<style>
    /* Add your CSS styles for the confirmation dialog here */
    body {
        overflow: hidden; /* Hide scrollbar */
    }
    .button-container {
        display: flex;
        justify-content: center;
    }
    .button-container button {
        background-color: black;
        color: white;
        padding: 5px 20px;
        border-radius: 25px;
        font-size: 20px;
        cursor: pointer;
        width: 100px; /* Set a fixed width */
        height: 40px; /* Set a fixed height */
    }
    .button-container button:hover {
        background-color: green;
    }
</style>

<div style="text-align: center;">
    <p style="font-size: 22px;">Are you sure you want to delete the order with ID <?php echo $data['purchaseId']; ?>?</p>
    <div style="position: absolute; bottom: 2px; width: 100%;" class="button-container">
        <button onclick="parent.cancelDelete()">No</button>
        <form id="deleteForm" method="POST" action="<?php echo URLROOT; ?>/ccm/delete_purchaseorder?id=<?php echo $data['purchaseId']; ?>">
            <input type="hidden" name="order_id" id="orderIdInput" value="<?php echo $data['purchaseId']; ?>">
            <button onclick="submitFormAndClose(event)">Yes</button>
        </form>
    </div>
</div>

<script>
    function submitFormAndClose(event) {
        event.preventDefault(); // Prevent default form submission behavior
        document.getElementById('deleteForm').submit();
        var confirmationdialog = parent.document.getElementById('confirmationdialog');
        confirmationdialog.style.display = 'none';

        // Reload parent page after 3 seconds (consider using AJAX for a smoother experience)
        setTimeout(function() {
            window.parent.location.reload();
        }, 3000);
    }

    function cancelDelete() {
        var confirmationdialog = parent.document.getElementById('confirmationdialog');
        confirmationdialog.style.display = 'none';
    }
</script>

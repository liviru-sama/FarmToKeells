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
        background-color: #65A534;
    }

    #confirmationDialog {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white; /* Set background color with opacity */
    border: 1px solid #ccc;
    z-index: 999; /* Ensure iframe is above other elements */
    padding: 20px;
    border-radius: 25px;
    backdrop-filter: blur(70px);
    box-shadow: 0 .4rem .8rem #0005;

}
</style>

<div style="text-align: center;">
    <p style="font-size: 22px;">Are you sure you want to delete the order with ID <?php echo $data['purchaseId']; ?>?</p>
    <div style="position: absolute; bottom: 2px; width: 100%;" class="button-container">
        <button onclick="cancelDelete()">No</button>
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
    var confirmationDialog = parent.document.getElementById('confirmationDialog');
    confirmationDialog.style.display = 'none';
}

function cancelDelete() {
        var confirmationDialog = parent.document.getElementById('confirmationDialog');
        confirmationDialog.style.display = 'none';

        // Hide the iframe
       
    }
    var iframeContent = `<style>

body {
    overflow: hidden; /* Hide scrollbar */
    background
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
      background-color: #65A534;
  }
</style>

</script>

<?php
// No of the box that needs to be selected
$side = 4;

include "inc/topsides.php";
?>

<!-- link css here -->
<link rel="stylesheet" href="<?php echo CSS;?>forms.css">

<!-- Page content starts here with midbox-->
        <div class="midbox">
            <div class="editsave">
                <h1>Driver Information - <?= $data['driver']->D_id ?></h1>
                <div class="editdelete">
                    <button class="edit" id="edit">Edit</button>
                    <a href="<?php echo URLROOT; ?>/Transport/deleteDriver/<?= $data['driver']->D_id ?>">
                        <button class="edit delete" id="delete">Delete</button>
                    </a>
                </div>
            </div>
                <form id="dInfo" action="<?= URLROOT ?>/Transport/editDriver" method="post">
                <input type="hidden" name="D_id" id="D_id" value="<?= $data['driver']->D_id ?>">
                <div class="text-field">
                    <input type="text" name="D_name" id="D_name" value="<?= $data['driver']->D_name ?>" disabled required>
                    <span></span>
                        <label>Name</label>
                </div>
                <div class="error" id="D_name-error"><?php echo $data['errors']['D_name_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="D_email" id="D_email" value="<?= $data['driver']->D_email ?>" disabled required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="error" id="D_email-error"><?php echo $data['errors']['D_email_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="D_contact" id="D_contact" value="<?= $data['driver']->D_contact ?>" disabled required>
                    <span></span>
                    <label>Contact No.</label>
                </div>
                <div class="error" id="D_contact-error"><?php echo $data['errors']['D_contact_err']; ?></div>

                <div class="text-field">
                    <input type="text" name="D_address" id="D_address" value="<?= $data['driver']->D_address ?>" disabled required>
                    <span></span>
                    <label>Address</label>
                </div>
                <div class="error" id="D_address-error"><?php echo $data['errors']['D_address_err']; ?></div>

                <div class="text-field">
                    <input type="date" name="DateJoined" id="DateJoined" value="<?= $data['driver']->DateJoined ?>" disabled required>
                    <span></span>
                    <label>Date Joined</label>
                </div>
                <div class="error" id="DateJoined-error"><?php echo $data['errors']['DateJoined_err']; ?></div>

                </form>
        </div>


<!-- JS -->
<script src="<?php echo JS;?>transport/Dinfo.js"></script>

<!-- Footer -->
<?php include "inc/bottom.php" ?>
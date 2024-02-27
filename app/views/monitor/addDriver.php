<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= CSS ?>forms.css">
        <!-- <script src="<?= JS ?>addVehicle.js"></script> -->
        <title><?= $data['title'] ?></title>
    </head>
    <body>
        <section class="form">
            <div class="center">
                <h1>Add Driver</h1>
                <form action="<?= URLROOT ?>/Monitor/addDriver" method="post">
                        
                    <div class="text-field">
                        <input type="text" name="D_name" id="D_name" required>
                        <span></span>
                         <label>Name</label>
                    </div>
                    <div class="error" id="D_name-error"><?php echo $data['errors']['D_name_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="D_email" id="D_email" required>
                        <span></span>
                        <label>Email</label>
                    </div>
                    <div class="error" id="D_email-error"><?php echo $data['errors']['D_email_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="D_contact" id="D_contact" required>
                        <span></span>
                        <label>Contact No.</label>
                    </div>
                    <div class="error" id="D_contact-error"><?php echo $data['errors']['D_contact_err']; ?></div>

                    <div class="text-field">
                        <input type="text" name="D_address" id="D_address" required>
                        <span></span>
                        <label>Address</label>
                    </div>
                    <div class="error" id="D_address-error"><?php echo $data['errors']['D_address_err']; ?></div>

                    <div class="text-field">
                        <input type="date" name="DateJoined" id="DateJoined" required>
                        <span></span>
                        <label>Date Joined</label>
                    </div>
                    <div class="error" id="DateJoined-error"><?php echo $data['errors']['DateJoined_err']; ?></div>

                    <input type="submit" value="Add Driver">
                </form>
            </div>
        </section>
    </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
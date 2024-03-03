<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/add_product.css">
    <style>
        /* CSS for styling the form */
        .form-container {
            width: 50%; /* Set the width to occupy half of the page */
            margin: 0 auto; /* Center the container horizontally */
        }
        .text-field {
            margin-bottom: 10px; /* Add some spacing between input fields */
        }
        input[type="date"] {
            width: calc(100% - 10px); /* Adjust the width of the date inputs */
        }
        input[type="submit"] {
            width: 100%; /* Make the submit button full width */
        }
        .iframe-container {
            margin-top: 20px; /* Add margin to separate the iframe from the form */
        }
        #report_frame {
            width: 100%;
            height: 400px;
            border: none; /* Remove border from iframe */
        }
    </style>
</head>

<body>
    <section class="header">
        
    </section>
    
    <section class="form">
        <div class="form-container">
            <h1>Generate Report</h1>
            <form action="<?php echo URLROOT; ?>/ccm/displayInventoryHistoryReport" method="post" >
                <div class="text-field">
                    <label for="start_date">Start Date:</label> 
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="text-field">
                    <label for="end_date">End Date:</label> 
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <input type="submit" value="Generate Report">
            </form>
        </div>
    </section>

   
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

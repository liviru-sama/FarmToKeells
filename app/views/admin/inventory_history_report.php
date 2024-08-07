<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }
        
        /* CSS for styling the chart container */
        #chartContainer {
            width: 75%; /* Set the width of the chart container */
            margin: 20px auto; /* Center the chart container */
            background-color: transparent;
            border: none; /* Remove border */
            width: 60%; /* Adjust width */
            height: 60%; /* Transparent white background color */
            backdrop-filter: blur(50px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            position: relative; /* Fixed positioning to display in front of the form */
            top: 15%; /* Position at the center vertically */
            left: 25%; /* Position at the center horizontally */
            transform: translate(-50%, -50%); /* Center the container */
           /* Ensure it's on top of other elements */
            display: none; /* Initially hide the container */
        }
       
        #reportInfo table {
            margin: 20px auto;
            background-color: transparent;
            backdrop-filter: blur(50px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            border-collapse: collapse;
            width: 350px; /* Example width */
    height: 100px; /* Example height */
    background-color: #ccc; /* Example background color */
    position: relative; /* Absolute positioning */
    margin-top: 25px; /* Position at the center vertically */
    /* Position at the center horizontally */
    transform: translate(-50%, -50%); /* Center the container */
 /* Ensure it's above the chart container */

          

   



            


  

        }
        #reportInfo th, #reportInfo td {
            
            
            padding: 8px;
            text-align: left;
        }
        #reportInfo th {
            
            background-color: #65A534;
        }
        #reportInfo td {
           
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
    <div class="navbar-icons">
    <div class="navbar-icon-container" data-text="Go Back">

<a href="#" id="backButton" onclick="goBack()">
    <img src="<?php echo URLROOT; ?>/public/images/back.png" alt="back" class="navbar-icon">
</a></div>

<div class="navbar-icon-container" data-text="Notifications">

<a href="<?php echo URLROOT; ?>/admin/notifications" id="notificationsButton" onclick="toggleNotifications()" >
<div class="redcircle"></div>
 <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash3.png" alt="Notifications" class="navbar-icon">
</a></div>

<div class="navbar-icon-container" data-text="Logout">

<a href="<?php echo URLROOT; ?>/admin/logout">
    <img src="<?php echo URLROOT; ?>/public/images/logout.png" alt="logout" class="navbar-icon">
</a></div>
</div>
<img src="<?php echo URLROOT; ?>/public/images/logoblack.png" alt="Logo" class="navbar-logo">

</div>
<script>
    // JavaScript function to go back to the previous page
    function goBack() {
        window.history.back();
    }
</script>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                   
                    <a href="<?php echo URLROOT; ?>/admin/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                  
                    
                    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" style="background: #65A534; transform: scale(1.08);" >
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div></a>

                   
                   
                    <a href="<?php echo URLROOT; ?>/admin/payment" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5">
                            <img src="<?php echo URLROOT; ?>/public/images/pay.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Payment</h6>
                        </div>
                    </a>
    


                        <a href="<?php echo URLROOT; ?>/admin/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6" >
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Reply</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/admin/manageUsers" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash7.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Users</h6>
                        </div>
                    </a>


                    
                </div>
            </div>
        </section>
    </div>

    <!-- Main content -->
    <div class="main-content">
    <a href="<?php echo URLROOT; ?>/admin/stock_overviewbar" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp;&nbsp;STOCK LEVELS</h5></a>

  

          
  
                <a href="<?php echo URLROOT; ?>/admin/displayReportGenerator" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" style="background: #65A534; transform: scale(1.08); border-radius: 10px 10px 10px 10px; padding: 10px;">&nbsp;&nbsp;&nbsp;GENERATE QUANTITY-TIME CHART</h5></a>

    <a href="<?php echo URLROOT; ?>/admin/displayReportGeneratorprice" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >GENERATE PRICE-TIME CHART</h5>
            </a>

            <a href="<?php echo URLROOT; ?>/admin/view_price" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" >&nbsp;&nbsp;&nbsp; PRODUCT PRICES</h5>
            </a>

    <a href="<?php echo URLROOT; ?>/admin/marketdemand" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading">MARKET DEMAND </h5></a>

            </br>  <main class="table">
</br>




<a href="<?php echo URLROOT; ?>/admin/displayReportGenerator" style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading" >&nbsp;&nbsp;&nbsp; QUANTITY REPORT FORM</h5></a>

    <a  style="text-decoration: none;">
                <h5 class="inline-heading" class
                = "tab-heading tab-selected" style="background: #65A534; transform: scale(1.08); padding: 2px;">QUANTITY-TIME CHART</h5>
            </a>
        
            <main class="table">
            <section class="table_body">

    <div id="reportInfo">
        <table></br></br></br>
            <tr>
                <th>Selected Product</th>
                <td><?php echo htmlspecialchars($data['product_name']); ?></td>
                <span></span>
            </tr>
            <tr>
                <th>From</th>
                <td><?php echo htmlspecialchars($data['start_date']); ?></td>
            </tr>
            <tr>
                <th>To</th>
                <td><?php echo htmlspecialchars($data['end_date']); ?></td>
            </tr>
        </table>
    </div></br></br></br></br></br>  </br></br>  </br>      
    <div id="chartContainer">
    <p style="text-align: center;">
    <strong>Quantity change of <?php echo htmlspecialchars($data['product_name']); ?> over time</strong>
</p>


        <canvas id="quantityChart"></canvas>
    </div>
   
    <script>
    var ctx = document.getElementById('quantityChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
    labels: [<?php foreach ($data['inventory_history'] as $record) echo "'" . $record->change_date . "', "; ?>],
    datasets: [{
        label: 'Quantity Change of <?php echo htmlspecialchars($data['product_name']); ?>',
        data: [<?php foreach ($data['inventory_history'] as $record) echo "'" . $record->quantity_change . "', "; ?>],
        backgroundColor: 'rgba(255, 255, 255, 0)',
        borderColor: ['#65A534', 'white'], // Set the border colors
        borderWidth: 13,
        pointBackgroundColor: 'black',
        pointBorderColor: '#ffffff',
        pointBorderWidth: 2,
        pointRadius: 9,
        pointHoverRadius: 10,
        tension: 0.1,
        fill: false,
        borderDash: [], // Set the border dash to a solid line
        borderDashOffset: 0, // Set the border dash offset
        borderJoinStyle: 'miter', // Set the border join style
        pointStyle: 'circle' // Set the point style
    }]
},

        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'black'
                    },
                    ticks: {
                        color: 'black'
                    }
                },
                x: {
                    grid: {
                        color: 'black'
                    },
                    ticks: {
                        color: 'black'
                    }
                }
            }
        }
    });

    // JavaScript code to display the report container
    document.addEventListener('DOMContentLoaded', function() {
        var chartContainer = document.getElementById('chartContainer');
        chartContainer.style.display = 'block'; // Show the container
    });


    function updateNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT; ?>/admin/notify', true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Parse response as JSON
                var response = JSON.parse(xhr.responseText);

                // Get the red circle element
                var redCircle = document.querySelector('.redcircle');

                // Update red circle based on unread notifications
                if (response.unread) {
                    redCircle.style.display = 'block'; // Show red circle
                } else {
                    redCircle.style.display = 'none'; // Hide red circle
                }
            }
        };

        xhr.send();
    }

    // Call the function initially
    updateNotifications();
    setInterval(updateNotifications, 5000);
</script>


</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

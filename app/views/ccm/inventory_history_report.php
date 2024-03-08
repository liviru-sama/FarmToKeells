<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory History Report</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* CSS for styling the chart container */
        #chartContainer {
            width: 80%; /* Set the width of the chart container */
            margin: 20px auto; /* Center the chart container */
            background-color: transparent;
            border: none; /* Remove border */
            width: 60%; /* Adjust width */
            height: 60%; /* Transparent white background color */
            backdrop-filter: blur(50px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            position: fixed; /* Fixed positioning to display in front of the form */
            top: 60%; /* Position at the center vertically */
            left: 50%; /* Position at the center horizontally */
            transform: translate(-50%, -50%); /* Center the container */
            z-index: 999; /* Ensure it's on top of other elements */
            display: none; /* Initially hide the container */
        }
        #reportInfo {
            margin-bottom: 20px;
            border-radius: .8rem;
            
        }
        #reportInfo table {
            background-color: transparent;
            backdrop-filter: blur(50px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            border-collapse: collapse;
            width: 60%;
            margin: 0 auto;
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
    
    <div id="reportInfo">
        <table>
            <tr>
                <th>Selected Product</th>
                <td><?php echo htmlspecialchars($data['product_name']); ?></td>
                <span></span>
            </tr>
            <tr>
                <th>Selected Start Date</th>
                <td><?php echo htmlspecialchars($data['start_date']); ?></td>
            </tr>
            <tr>
                <th>Selected End Date</th>
                <td><?php echo htmlspecialchars($data['end_date']); ?></td>
            </tr>
        </table>
    </div>

    <div id="chartContainer">
        <!-- Display the line chart canvas -->
        <canvas id="quantityChart"></canvas>
    </div>

    <!-- JavaScript code to create the line chart -->
    <script>
        var ctx = document.getElementById('quantityChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:  [<?php foreach ($data['inventory_history'] as $record) echo "'" . $record->change_date . "', "; ?>],
                datasets: [{
                    label: 'Quantity Change',
                    data: [<?php foreach ($data['inventory_history'] as $record) echo "'" . $record->quantity_change . "', "; ?>],
                    backgroundColor: 'rgba(255, 255, 255, 0)',
                    borderColor: '#65A534',
                    borderColorborderColor: '#65A534',
                    borderWidth: 10,
                    pointBackgroundColor: 'black',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 1,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.1
                    
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
    </script>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

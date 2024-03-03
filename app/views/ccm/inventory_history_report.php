<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory History Report</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* CSS for styling the chart container */
        #chartContainer {
            width: 80%; /* Set the width of the chart container */
            margin: 20px auto; /* Center the chart container */
            background-color: black; /* Transparent white background color */
            backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
        }
    </style>
</head>
<body>
    <h1>Inventory History Report</h1>
    <div id="chartContainer">
        <!-- Display the line chart canvas -->
        <canvas id="quantityChart"></canvas>
    </div>

    <script>
        // JavaScript code to create the line chart
        var ctx = document.getElementById('quantityChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:  [<?php foreach ($data['inventory_history'] as $record) echo "'" . $record->change_date . "', "; ?>],
                datasets: [{
                    label: 'Quantity Change',
                    data: [<?php foreach ($data['inventory_history'] as $record) echo "'" . $record->quantity_change . "', "; ?>],
                    backgroundColor: 'rgba(255, 255, 255, 0)', // Transparent background color of the area under the line
                    borderColor: '#4CAF50', // White border color of the line
                    borderWidth: 8, // Width of the line
                    pointBackgroundColor: 'black', // White background color of the data points
                    pointBorderColor: '#ffffff', // White border color of the data points
                    pointBorderWidth: 1, // Border width of the data points
                    pointRadius: 5, // Radius of the data points
                    pointHoverRadius: 7, // Radius of the data points on hover
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#ffffff' // White color for the grid lines
                        },
                        ticks: {
                            color: '#ffffff' // White color for the scale labels
                        }
                    },
                    x: {
                        grid: {
                            color: '#ffffff' // White color for the grid lines
                        },
                        ticks: {
                            color: '#ffffff' // White color for the scale labels
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

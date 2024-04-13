<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>

    <script src="<?php echo JS;?>/ccm/updatecircle.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/ccm/place_salesorder.css">

    <style>
        body,
        html {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
            height: 100%;
        }

        .bar-container {
            top:18%;
            left:5%;
            display: flex;
            align-items: flex-end;
            height: 400px; /* Adjust height as needed */
            position: relative;
        }

        .bar {
    background-color: #65A534;
    margin: 0 5px; /* Adjust margin as needed */
    border-radius: 5px;
    text-align: center;
    color: #fff;
    font-size: 18px;
    padding: 5px;
    position: relative;
    width: 150px;
    backdrop-filter: blur(19px);
    box-shadow: 0 .9rem .8rem #0005;
}


        .bar-name {
            margin-top: 5px;
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-weight: bold;
            font-size: 25px;

        }

        .bar::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #000;
        }

        .bar-graph {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            color: #000;
        }

        .bar-percentage {
            color:white;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
        }

        .axis-line {
            position: absolute;
            width: 80%;
            height: 100%;
            
        }

        .x-axis-line {
            bottom: 10;
            border-bottom: 5px solid #000;
        
        }

        .y-axis-line {
            left: 0;
            border-left: 5px solid #000;
        }

        .axis-label {
            color: #fff;
            font-weight: bold;
            position: absolute;
        }

        .x-axis-label {
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
        }

        .y-axis-label {
    top: 50%;
    left: -5%; /* Adjust the distance from the vertical line */
    transform: translateY(-50%) rotate(-90deg);
}

    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <h1></h1>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-container">
                <a href="<?php echo URLROOT; ?>/ccm/view_inventory" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-1">
                            <img src="<?php echo URLROOT; ?>/public/images/veg.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inventory</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/purchaseorder" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-2" > 
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash1.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Orders</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/marketdemand" style="width: 12.5%; height: (20%);color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-4" style="background: #65A534; transform: scale(1.08);">
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash4.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Market Prices</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/displayReportGenerator" style="width: 12.5%; height: 20%; color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-5" >
                            <img src="<?php echo URLROOT; ?>/public/images/farmer_dashboard/dash2.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Reporting </h6>
                        </div>
                    </a>

                    
                    </a> <a href="<?php echo URLROOT; ?>/ccm/inquiry" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-6">
                            <img src="<?php echo URLROOT; ?>/public/images/inquiry.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Inquiry</h6>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT; ?>/ccm/stock_overviewbar" style="width: 12.5%; height: (20%); color: black;text-decoration: none; font-family: 'inter';">
                        <div class="menu" data-name="p-7">
                            <img src="<?php echo URLROOT; ?>/public/images/bar.png" alt="" style="width: 50px; height: 50px;">
                            <h6>Stock levels</h6>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <!-- Main content -->
    <div class="main-content">
      
      <h2 class="inline-heading">&nbsp;&nbsp;&nbsp;PRODUCT INVENTORY  
      <input type="text" id="searchInput" onkeyup="searchProducts()" placeholder="Search for products..." style="width: 300px; height:40px; padding: 10px 20px; background-color: #65A534; color: white; border: 2px solid #4CAF50; border-radius: 5px;">

                               
      <a class="button" class="inline-heading" href="<?php echo URLROOT; ?>/ccm/add_product">+ Add Product</a>

      </h2>
  </br>    </br>
  
      <main class="table">
          <section class="table_header">


          </section>
          <section class="table_body">
              <form method="post">
                  <table>
                      <thead>
                          <tr>
                              <th>PRODUCT ID</th>
                              <th>PRODUCT NAME </th>
                              <th>PRODUCT IMAGE</th>
                              <th>PRODUCT TYPE</th>
                              <th>PRESENT QUANTITY(IN kgs) </th>
                              <th>PRICE</th>

                              <th>EDIT</th>
                              
                           </tr>
                      </thead>
                      <tbody>
                   
                          
                              

 
  <?php while ($row = mysqli_fetch_assoc($data['products'] )) { ?>
      <tr>
          <td><?php echo $row['product_id'] ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><img src="<?php echo is_object($row) ? $row->image : $row['image']; ?>" alt="<?php echo is_object($row) ? $row->name : $row['name']; ?>" style="width: 50px;"></td>
          <td><?php echo $row['type'] ?></td>
          <td><?php echo $row['quantity'] ?></td>
          <td><?php echo $row['price'] ?></td>
          <td><a href="<?php echo URLROOT; ?>/ccm/edit_product?id=<?php echo $row['product_id']; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png"></a></td>
         
      </tr>
  <?php } ?>


                      </tbody>
                  </table>
              </form>
    </main>
</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

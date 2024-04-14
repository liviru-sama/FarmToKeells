<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS;?>ccm/place_salesorder.css">
    <style>
        .disabled-link {
            pointer-events: none;
            opacity: 0.5;
            filter: grayscale(100%);
        }
    </style>
</head>

<body>
    <section class="header">
        <h4>LET THEM KNOW YOUR AVAILABLE PRODUCTS!!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <a class="button" href="<?php echo URLROOT; ?>/farmer/add_salesordercommon?user_id=<?php echo $_SESSION['user_id']; ?>">+ADD NEW</a>

        </h4>
        <main class="table">
            <section class="table_header">


            </section>
            <section class="table_body">
                <form method="post">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="12"><a style="text-align:right;" href="<?php echo URLROOT; ?>/farmer/cardsalesorder?user_id=<?php echo $_SESSION['user_id']; ?>">Table View</a></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            // Check if data is not empty and is an array
                            if (!empty($data['salesorders']) && is_array($data['salesorders'])) {
                                foreach ($data['salesorders'] as $row) {
                            ?>
                            
                                <td class="card" colspan="12">
                                    <div class="card__content">
                                        <h3 class="card__title" style="color: green; font-family: 'Arial', sans-serif;">Order ID: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->order_id; ?></span></h3>
                                        <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Product: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->name; ?></span></p>
                                        <img src="<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" class="card__image">
                                        <div class="card__details">
                                            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Type: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->type; ?></span></p>
                                            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Quantity: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->quantity; ?> (kgs)</span></p>
                                            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Price per kg: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->price; ?></span></p>
                                            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Date: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->date; ?></span></p>
                                            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Collection Address: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->address; ?></span></p>
                                            <p class="card__text" style="color: green; font-family: 'Arial', sans-serif;">Status: <span style="color: black; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $row->status; ?></span></p>
                                            <?php
                                            // Calculate the total price
                                            $totalPrice = $row->quantity * $row->price;
                                            ?>
                                            <p class="card__text" style="font-size: 20px; color: black; font-family: 'Arial', sans-serif;">Total Price: Rs. <span style="font-size: 20px; color: red; font-weight: bold; font-family: 'Verdana', sans-serif;"><?php echo $totalPrice; ?> .00</span></p>
                                        </div>
                                    </div>
                                    <div class="card__actions">
                                        <a href="<?php echo URLROOT; ?>/farmer/edit_salesorder?id=<?php echo $row->order_id; ?>"><img src="<?php echo URLROOT; ?>/public/images/edit.png" class="card__action"></a>
                                        <a href="<?php echo URLROOT; ?>/farmer/place_order?order_id=<?php echo $row->order_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>&product_name=<?php echo urlencode($row->name); ?>&quantity=<?php echo $row->quantity; ?>&address=<?php echo urlencode($row->address); ?>" class="<?php echo $row->status !== 'Approved' ? 'disabled-link' : ''; ?>"><img src="<?php echo URLROOT; ?>/public/images/transport.png" class="card__action <?php echo $row->status !== 'Approved' ? 'disabled-link' : ''; ?>"></a>
                                        <a href="<?php echo $row->status === 'Completed' ? URLROOT . '/farmer/place_order?order_id=' . $row->order_id . '&user_id=' . $_SESSION['user_id'] . '&product_name=' . urlencode($row->name) . '&quantity=' . $row->quantity . '&price=' . $row->quantity : '#'; ?>"><img src="<?php echo URLROOT; ?>/public/images/pay.png" class="card__action <?php echo $row->status !== 'Completed' ? 'disabled-link' : ''; ?>"></a>
                                        <a href="#" onclick="<?php echo ($row->status === 'Rejected' || $row->status === 'Completed') ? "confirmDelete('" . URLROOT . "/farmer/delete_salesorder?id=" . $row->order_id . "', '" . $row->order_id . "')" : "return false;"; ?>"><img src="<?php echo URLROOT; ?>/public/images/delete.png" class="card__action <?php echo ($row->status !== 'Rejected' && $row->status !== 'Completed') ? 'disabled-link' : ''; ?>"></a>
                                    </div>
                                </td>
                            <?php 
                                }
                            } else {
                                // Handle the case where no sales orders are found
                                echo "<tr><td colspan='12'>No sales orders found.</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </form>
            </section>
        </main>
    </section>

                            <iframe id="confirmationDialog" style="display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(10, 8, 8, 0.333); padding: 20px; border: 1px solid #ccc;" src=""></iframe>
                            <script>
                                // JavaScript code for confirmation dialog and delete functionality
                                // Add your JavaScript code here
                            </script>

                        </tbody>
                    </table>
                </form>
            </section>
        </main>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>

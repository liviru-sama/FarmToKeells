
<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin view inquiries</title>
    <link rel="stylesheet" href="<?php echo CSS;?>admin-view-inquiries.css">
    
</head>
<body>
    <section class="header">
        <nav>
            
            <a href="index.php"><img src="<?php echo URLROOT; ?>/public/images/logoBlack.png" ></a>
            <div class="nav-links">
                <ul>
                    <li><a href="farmer-profile.php">Account</a></li>
                    <li><a href="inquiries-support.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <h4>Inquiries</h4>
        <main class="table">
        <section class="table_header">
       

        </section>
        <section class="table_body">
             <table>
                <thead>
                    <tr>
                        <th>inquirer ID</th>
                        <th>name </th>
                        <th>email</th>
                        <th>message </th>
                      
                        



                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>carrot</td>
                        <td>
                            <p class="category">Hill country</p></td>
                        <td>300</td>
                        

                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td><img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>beetorot</td>
                        <td>
                            <p class="category">low country</p></td>
                        <td>250</td>
                       
                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td><img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>potato</td>
                        <td>
                            <p class="category">organic</p></td>
                        <td>350</td>
                       
                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td><img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td>sweetpotato</td>
                        <td>
                            <p class="category">organic</p></td>
                        <td>650</td>
                        

                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td><img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                    <tr>
                        <td>5</td>
                        <td>ladies fingers</td>
                        <td>
                            <p class="category">organic</p></td>
                        <td>650</td>
                      

                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td> <img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                    <tr>
                        <td>6</td>
                        <td>onions</td>
                        <td>
                            <p class="category">organic</p></td>
                        <td>650</td>
                        

                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td><img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                    <tr>
                        <td>7</td>
                        <td>cabbage</td>
                        <td>
                            <p class="category">organic</p></td>
                        <td>650</td>
                        

                        <td> <a href="ccm-edit-product.php"><img src="edit.png"></a></td>
                        <td>  <img src="<?php echo URLROOT; ?>/public/images/wasri/delete.png" ></a></td>

                    </tr>
                </tbody>
             </table>
        </section>
    </main>

</body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>

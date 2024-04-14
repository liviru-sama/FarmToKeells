<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($data->page) && $data->page === 'index'): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/main.css">
    <?php endif; ?>
    <style>
        body {
            /* Add your background image URL and properties here */
            background: url('<?php echo URLROOT; ?>/public/images/bg7.jpg') center center fixed;
            background-size: cover;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php if(isset($_SESSION['user_id'])): ?>
        <section class="header">
            <nav>
                <div>
                </div>
                <div class="nav-links">
                    <ul>
                        <li><a href="<?php echo URLROOT; ?>/farmer/view_profile">Account</a></li>
                        <li><a href="<?php echo URLROOT; ?>/users/contact">Contact</a></li>
                        <li><a href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </section>

    <?php else : ?>

    <section class="header">
            <nav>
                <div class="nav-links">
                    <ul>
                        <li><a href="<?php echo URLROOT; ?>/users/contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </section>

    <?php endif; ?>
</body>
</html>

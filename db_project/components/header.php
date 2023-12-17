<?php

    include('api/db/connection.php');
    include("api/utils.php");

    $user_logged_in = get_login_status($conn);
    $user_id = get_logged_in_user_id($conn);
    $cart_count = get_cart_count($conn, $user_id);

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container" style="max-width: 1200px">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo.jpg" alt="logo" width="50%"></a>
            <div class="navigation collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class=" nav nav-item">
                <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                <a href="collections.php" class="nav-link">Collections</a>
                </li>
                <li class="nav-item">
                <a href="index.php#last_section" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                <a href="myorders.php" class="nav-link" style="white-space: nowrap;">My Orders</a>
                </li>
                <li class="nav-item">
                    <?php
                        if ($user_logged_in) {
                            ?>
                                <a href="api/user/logout.php" class="nav-link">Logout</a>
                            <?php
                        } else {
                            ?>
                                <a href="log_in.php" class="nav-link">Sign In</a>
                            <?php
                        }
                    ?>
                </li>
                <li style="display: <?php 
                    if (!$user_logged_in) {
                        echo "none";
                    }
                ?>;" class="nav-item">
                    <a href="mycart.php"><button type="button" class="btn btn-outline-secondary">My Cart (<?php echo $cart_count; ?>)</button></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</header>

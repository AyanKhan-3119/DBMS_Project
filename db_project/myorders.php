<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/collections.css">
    <title>AIA Watches Collection Page</title>
</head>
<body>
    <?php 
    
    include('components/header.php'); 
    $orders = $conn->query("SELECT * FROM order_table WHERE user_id='$user_id'");

    ?>
    <main>
        <div class="container mt-5">
            <h2>My orders</h2>

            <table class="table">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Order Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php

                        while ($order = $orders->fetch_assoc()) {
                            ?> 
                                <tr>
                                    <td><?php echo $order["order_id"]; ?></td>
                                    <td><?php echo $order["total_amount"]; ?></td>
                                    <td><?php echo $order["order_date"]; ?></td>
                                    <td><?php echo $order["order_status"]; ?></td>
                                </tr>
                            <?php
                        }

                    ?>
                </tbody>
            </table>

        </div>
    </main>

</body>
</html>
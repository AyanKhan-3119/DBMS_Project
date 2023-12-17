<?php include("session.php");
?>

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

    $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
    $result = $conn->query($sql);
    $grand_total = 0;

    ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <h1>MY CART</h1>
                </div>
                <div class="col-lg-9">
                <table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        while ($row = $result->fetch_row()) {
                            $product = $conn->query("SELECT * FROM product WHERE product_id='$row[2]'")->fetch_row();
                            $total = $product[4] * $row[3];
                            $grand_total += $total;
                            ?>

                            <tr>
                                <td><?php echo $product[0]; ?></td>
                                <td><?php echo $product[1]; ?></td>
                                <td><?php echo $product[4]; ?><input type='hidden' class='iprice' value='$value[product_price]'></td>
                                <td>
                                    <form action='api/cart/update_product_quantity.php' method='POST'>
                                        <input class='text-center iquantity' name='quantity' onchange='this.form.submit();' type='number' value='<?php echo $row[3]; ?>' min='1' max='10'>
                                        <input type='hidden' name='product_id' value='<?php echo $product[0]; ?>'>    
                                    </form>
                                </td>
                                <td class='itotal'><?php echo $total; ?></td>
                                <td>
                                    <form action='api/cart/remove.php' method='POST'>
                                        <button name='remove_product' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                        <input type='hidden' name='product_id' value='<?php echo $product[0]; ?>'>    
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
                </table>
                </div>
                <div class="col-lg-3">
                    <div class="border bg-light rounded p-4">
                        <h4>Grand Total:</h4>
                        <h5 class="text-right" id="gtotal">$<?php echo $grand_total; ?></h5>
                        <br>
                    </div>
                </div>
                <a href="checkout.php">
                    <button class="btn btn-outline-success" >Checkout</button>
                </a>

            </div>
        </div>
    </main>

</body>
</html>
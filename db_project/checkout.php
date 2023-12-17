<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/sign_up.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 

include('api/db/connection.php');
include('api/utils.php');

$user_id = get_logged_in_user_id($conn);

if ($conn->query("SELECT * FROM cart WHERE user_id='$user_id'")->num_rows <= 0) {
    ?>
        <script>
            alert("The cart is empty!!");
            window.location = "/db_project/mycart.php";
        </script>
    <?php
}

?>

<div class="container mt-5 box_su">
    <div class="row">
        <div class="col-md-8">
            <h2>Shipping Information</h2>
            <form method="POST" action="api/order/checkout.php">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="col-md-6">
                        <label for="zip" class="form-label">ZIP Code</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                </div>
        </div>
        <div class="col-md-4">
            <h2>Order Summary</h2>
            <ul class="list-group">
                <?php
                $cart_products = $conn->query("SELECT * FROM cart WHERE user_id='$user_id'");
                $total = 0;
                while ($row = $cart_products->fetch_assoc()) {
                    $product_id = $row["product_id"];
                    $product = $conn->query("SELECT * FROM product WHERE product_id='$product_id'")->fetch_assoc();
                    $price = $product["price"] * $row["quantity"];
                    $total += $price;
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo $product["product_name"]; ?> x <?php echo $row["quantity"]; ?>
                            <span class="badge bg-primary rounded-pill">$<?php echo $price; ?></span>
                        </li>
                    <?php
                }

                ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total
                    <span class="badge bg-primary rounded-pill">$<?php echo $total; ?></span>
                </li>
            </ul>
        </div>
    </div>
    <input type="text" style="display: none;" name="total_amount" value="<?php echo $total; ?>">
    <h2 class="mt-4">Payment Information</h2>
        <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
        </div>
        <div class="mb-3">
            <label for="expirationDate" class="form-label">Expiration Date</label>
            <input type="text" class="form-control" id="expirationDate" name="expirationDate" required>
        </div>
        <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
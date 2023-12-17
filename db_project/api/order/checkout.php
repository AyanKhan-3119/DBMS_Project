<?php

include('../db/connection.php');
include('../utils.php');

$user_id = get_logged_in_user_id($conn);

// return if cart is empty

if ($conn->query("SELECT * FROM cart WHERE user_id='$user_id'")->num_rows <= 0) {
    ?>
        <script>
            alert("The cart is empty!!");
            window.location = "/db_project/mycart.php";
        </script>
    <?php
    exit();
}

// get order details
$total_amount = $_POST["total_amount"];

// get shipping details
$fullname = $_POST["fullName"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip = $_POST["zip"];

// get payment details
$card_number = $_POST["cardNumber"];
$expiration = $_POST["expirationDate"];
$cvv = $_POST["cvv"];

// create new order
// $total_amount = 1;
$conn->query("INSERT INTO order_table (total_amount, user_id, order_status) VALUES ('$total_amount', '$user_id', 'processing')");
$order = $conn->query("SELECT * FROM order_table WHERE user_id='$user_id' ORDER BY order_id DESC LIMIT 1")->fetch_assoc();
$order_id = $order["order_id"];

// get all cart products from db and insert them into order_product table
$products = $conn->query("SELECT * FROM cart WHERE user_id='$user_id'");

while ($product = $products->fetch_assoc()) {
    $product_id = $product["product_id"];
    $conn->query("INSERT INTO order_product (order_id, product_id) VALUES ('$order_id', '$product_id')");
}   

// delete all products from user cart
$conn->query("DELETE FROM cart WHERE user_id='$user_id'");

// save payment details for order
$conn->query("INSERT INTO payment_information VALUES ('$card_number', '$expiration', '$cvv', '$order_id')");

// save shipping details for order
$conn->query("INSERT INTO shipping_information VALUES ('$fullname', '$email', '$address', '$city', '$zip', '$order_id')");

?>

<script>
    alert('<?php echo "Order has been placed!"; ?>');
    window.location = "/db_project/index.php";
</script>

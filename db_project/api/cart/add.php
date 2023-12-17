<?php

include('../db/connection.php');
include('../utils.php');

$logged_in_user_id = get_logged_in_user_id($conn);
$product_id = $_POST["product_id"];

if ($logged_in_user_id) {

    if ($conn->query("SELECT * FROM cart WHERE user_id='$logged_in_user_id' && product_id='$product_id'")->num_rows > 0) {
        $alert_message = "Product already in cart!";
        $redirect_link = "/db_project/collections.php";
    } else {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$logged_in_user_id', '$product_id', 1)";
        $conn->query($sql);
        $alert_message = "Product added to cart!";
        $redirect_link = "/db_project/collections.php";
    }

} else {
    $alert_message = "Login to add to cart";
    $redirect_link = "/db_project/collections.php";
}


?>

<script>
  alert('<?php echo $alert_message; ?>');
  window.location='<?php echo $redirect_link; ?>';
</script>

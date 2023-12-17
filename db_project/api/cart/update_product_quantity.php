<?php

include('../db/connection.php');
include('../utils.php');

$logged_in_user_id = get_logged_in_user_id($conn);
$product_id = $_POST["product_id"];
$quantity = $_POST["quantity"];

if ($logged_in_user_id) {
    $sql = "UPDATE cart SET quantity='$quantity' WHERE user_id='$logged_in_user_id' && product_id='$product_id'";
    $conn->query($sql);
    $alert_message = "Product quantity updated!";
    $redirect_link = "/db_project/mycart.php";
} else {
    $alert_message = "Please login first";
    $redirect_link = "/db_project/login.php";
}


?>

<script>
  alert('<?php echo $alert_message; ?>');
  window.location='<?php echo $redirect_link; ?>';
</script>

<?php

setcookie("email", '', time() - 3600, '/');
setcookie("password", '', time() - 3600, '/');

$redirect_link = "/db_project/index.php";
$alert_message = "Logged out!";

?>

<script>
  alert('<?php echo $alert_message; ?>');
  window.location='<?php echo $redirect_link; ?>';
</script>

<?php

include('../db/connection.php');

$password = $_POST["password"];
$email = $_POST["email"];

$sql = "SELECT * FROM user WHERE email='$email' && password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    setcookie("email", $email, time()+60*60*24*365, '/');
    setcookie("password", $password, time()+60*60*24*365, '/');
    $redirect_link = "/db_project/index.php";
    $alert_message = "User logged in successfuly!";
} else {
    $alert_message = "User not found!";
    $redirect_link = "/db_project/log_in.php";
}

?>

<script>
  alert('<?php echo $alert_message; ?>');
  window.location='<?php echo $redirect_link; ?>';
</script>

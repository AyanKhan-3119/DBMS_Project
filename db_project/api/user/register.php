<?php

include('../db/connection.php');

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

$sql = "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$password');";
$conn->query($sql);

setcookie("email", $email, time()+60*60*24*365, '/');
setcookie("password", $password, time()+60*60*24*365, '/');

?>

<script>
  alert('Account created successfuly!');
  window.location='/db_project/index.php';
</script>


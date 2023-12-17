

<?php

include('connection.php');

$product_values = "
  INSERT INTO product VALUES(14,'Spirit Classic', 'assets/img/product5.png', 'gold', 1150);
";

if ($conn->multi_query($product_values) === TRUE) {
    echo "Products added successfully";
} else {
  echo "Error inserting values: " . $conn->error;
}

?>
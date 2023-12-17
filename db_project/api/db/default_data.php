<?php

include('connection.php');

$product_values = "
  INSERT INTO product VALUES(1,'Fosil_me3', 'assets/img/featured1.png', 'classic', 1700);
  INSERT INTO product VALUES(2,'Duchen', 'assets/img/featured2.png', 'classic', 1600);
  INSERT INTO product VALUES(3,'Duchen_me2', 'assets/img/featured3.png', 'classic', 1500);
  INSERT INTO product VALUES(4,'Jazzmaster', 'assets/img/new1.png', 'gold', 1400);
  INSERT INTO product VALUES(5,'Ingersoll', 'assets/img/new2.png', 'gold', 1300);
  INSERT INTO product VALUES(6,'Khaki Pilot', 'assets/img/new3.png', 'gold', 1200);
  INSERT INTO product VALUES(7,'Dreyfuss Gold', 'assets/img/new4.png', 'wisco', 1100);
  INSERT INTO product VALUES(8,'Rose Gold', 'assets/img/product1.png', 'wisco', 1000);
  INSERT INTO product VALUES(9,'Jubilee Black', 'assets/img/product2.png', 'wisco', 900);
  INSERT INTO product VALUES(10,'Portuguese Rose', 'assets/img/product3.png', 'master', 1350);
  INSERT INTO product VALUES(11,'Longines Rose', 'assets/img/product4.png', 'master', 1250);
  INSERT INTO product VALUES(12,'Spirit Rose', 'assets/img/product5.png', 'master', 1150);
";

if ($conn->multi_query($product_values) === TRUE) {
    echo "Products added successfully";
} else {
  echo "Error inserting values: " . $conn->error;
}

?>
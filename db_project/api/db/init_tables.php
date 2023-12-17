<?php

include('connection.php');

$db_schema = "

CREATE TABLE IF NOT EXISTS user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE,
    username VARCHAR(255),
    password VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS product (
    product_id INT PRIMARY KEY,
    product_name VARCHAR(255),
    product_image TEXT,
    product_category TEXT,
    price INT
);
CREATE TABLE IF NOT EXISTS cart (
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);
CREATE TABLE IF NOT EXISTS order_table (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    total_amount INT,
    user_id INT,
    order_status VARCHAR(255),
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);
CREATE TABLE IF NOT EXISTS shipping_information (
    full_name VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    city VARCHAR(255),
    zip VARCHAR(255),
    order_id INT,
    FOREIGN KEY (order_id) REFERENCES order_table(order_id)
);
CREATE TABLE IF NOT EXISTS payment_information (
    card_number VARCHAR(255),
    expiration_date VARCHAR(255),
    cvv VARCHAR(255),
    order_id INT,
    FOREIGN KEY (order_id) REFERENCES order_table(order_id)
);
CREATE TABLE IF NOT EXISTS order_product (
    order_id INT,
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    FOREIGN KEY (order_id) REFERENCES order_table(order_id)
);
";

if ($conn->multi_query($db_schema) === TRUE) {
    echo "Database tables created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

?>
<?php

function get_login_status($conn) {

    try {
        if (!isset($_COOKIE["email"]) || !isset($_COOKIE["password"])) {
            return false;
        }

        $email = $_COOKIE["email"];
        $password = $_COOKIE["password"];

        $sql = "SELECT * FROM user WHERE email='$email' && password='$password'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    } catch (Exception $e) {
        return false;
    }

}

function get_logged_in_user_id($conn) {
    try {

        if (!isset($_COOKIE["email"]) || !isset($_COOKIE["password"])) {
            return false;
        }

        $email = $_COOKIE["email"];
        $password = $_COOKIE["password"];

        $sql = "SELECT * FROM user WHERE email='$email' && password='$password'";
        $result = $conn->query($sql);
        $id = $result->fetch_row()[0];

        return $id;
    } catch (Exception $e) {
        return false;
    }
}

function get_cart_count($conn, $user_id) {

    try {
        $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
        $result = $conn->query($sql);
    
        return $result->num_rows;
    } catch (Exception $e) {
        return 0;
    }
}

function get_products($conn, $category) {

    try {
        $sql = "SELECT * FROM product WHERE product_category='$category'";
        $result = $conn->query($sql);
    
        return $result;
    } catch (Exception $e) {
        return 0;
    }
}


?>

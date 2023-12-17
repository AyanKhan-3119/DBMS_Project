<?php 
include("session.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['ADD_TO_CART']))
    {

    }
    if (isset($_POST['remove_product']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['product_name']==$_POST['product_name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                alert('Item Removed');
                window.location.href='myCart.php';
                </script>";
            }
        }
    }
    if (isset($_POST['mod_quantity']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['product_name']==$_POST['product_name'])
            {
                $_SESSION['cart'][$key]['quantity']=$_POST['mod_quantity'];
                echo"<script>
                window.location.href='myCart.php';
                </script>";
            }
        }
    }
}
?>

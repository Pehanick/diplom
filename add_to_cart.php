<?php
  include 'components/core.php';
  include 'components/header.php';
  
  if (isset($_SESSION['user'])) {

    if (isset($_POST['addtobusket'])) {

        $conn->query("INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('{$_SESSION['user']['id']}','{$_GET['product_id']}')");
            
    }
}
header("Location: cart.php");
?>
  <link rel="stylesheet" href="style/style.css" />
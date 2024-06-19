<?php
include "components/core.php";
if (isset($_POST['updProduct'])) {
  $conn->query("UPDATE `products` SET `img`='{$_POST['file_new']}',`img_name`='{$_POST['name_new']}',
  `img_price`='{$_POST['price_new']}' WHERE `id` = {$_POST['id_new']}");
  header("Location: veliks.php");
}
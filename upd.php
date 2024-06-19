<?php
  include 'components/core.php';
  include 'components/header.php';
  $product_datas = ($conn->query("SELECT * FROM `products` WHERE `id` = {$_GET['product_id']}"))->fetch_assoc();
  if (isset($_POST['updProduct'])) {
    $id = $product_datas['id'];
    $conn->query("UPDATE `products` SET `img`='{$_POST['file_new']}',`img_name`='{$_POST['name_new']}',`img_price`='{$_POST['price_new']}' WHERE `id` = $id");
    header("Location: admin_panel.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
<div class="jopa_kota">
    <div class="content">
    <div class="container">
        <div class="kek">
          <div class="lul">
<div class="updProduct">
  <form action="update.php" method="POST">
    <h3>Обновить товар</h3>
    <p>
      <input type="hidden" name="id_new" placeholder="Цена" required value="<?php echo $product_datas['id'] ?>">
    </p>
    <p>
      <input type="text" name="price_new" placeholder="Цена" required value="<?php echo $product_datas['img_price'] ?>">
    </p>
    <p>
      <input type="text" name="name_new" placeholder="Название" required value="<?php echo $product_datas['img_name'] ?>">
    </p>
    <p>
      <input type="file" name="file_new"  placeholder="Картинка" required value="<?php echo $product_datas['img'] ?>">
    </p>
    <button name="updProduct">Обновить товар</button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<?php
  include 'components/footer.php';
  ?>
</html>
<?php
  include 'components/admin_panel_header.php';
  include 'components/core.php';
  if (!$_SESSION['user']) {
    header('Location: log.php');
  } else {
    if ($_SESSION['user']['status'] != 1) {
      header('Location: log.php');
    }
  }

  if (isset($_POST['addProduct'])) {
    foreach ($_POST as $key => $value) {
      if ($key != 'addProduct') {
        if ($value == '') {
          $errors = "Все поля должны быть заполнены!";
        }
      }
    }
    if (!isset($errors)) {
      $img = $_FILES['img'];
      $img_name = $_POST['img_name'];
      $img_price = $_POST['img_price'];
      $img_tmp = $_FILES['img']['tmp_name'];
      $for_bd_name = uniqid() . '.' . substr($img['type'], 6);
      move_uploaded_file($img_tmp, "img/" . $for_bd_name);
      $conn->query("INSERT INTO `products`(`img`, `img_name`, `img_price`) VALUES ('$for_bd_name','$img_name','$img_price')");
    }
  }
  
  if (isset($_POST['delProduct'])) {
    $id = $_POST['product_id'];
    $conn->query("DELETE FROM `products` WHERE `id` = $id");
  }
?>
  <link rel="stylesheet" href="style/style.css" />


  <div class="content">
    <div class="container">
        <div class="kek">
          <div class="lul">
  <div class="addProduct">
  <form action="./admin_panel.php" method="POST" enctype="multipart/form-data">
    <h3>Добавить новый товар</h3>
    <p>
      <input type="text" name="img_name" placeholder="Название">
    </p>
    <p>
      <input type="text" name="img_price" placeholder="Цена">
    </p>
    <p>
      <input type="file" name="img" placeholder="Картинка">
    </p>
    <button name="addProduct">Добавить товар</button>
    <p><?php
        if (isset($errors)) {
          echo "<p>$errors</p>";
        } ?></p>
  </form>
</div>
</div>
</div>
    </div>
</div>


<div class="content">
    <div class="container">
        <div class="kek">
          <div class="lul">
<div class="delProduct">
  <form action="./admin_panel.php" method="POST">
    <h3>Удалить товар</h3>
    <select name="product_id">
      <?php
      $products_result = $conn->query("SELECT * FROM `products`");
      if ($products_result->num_rows > 0) {
        while ($product = $products_result->fetch_assoc()) {
          echo '<option value="' . $product['id'] . '">' . $product['id'] . '</option>';
        }
      }
      ?>
    </select>
    <button name="delProduct">Удалить товар</button>
  </form>
</div>
</div>
</div>
</div>
    </div>

    <div class="jopa_kota">
    <div class="content">
    <div class="container">
        <div class="kek">
          <div class="lul">
<div class="updProduct">
  <form action="update.php" method="POST">
    <h3>Обновить товар</h3>
    <p>
      <input type="text" name="id_new" placeholder="Id">
    </p>
    <p>
      <input type="text" name="price_new" placeholder="Цена">
    </p>
    <p>
      <input type="text" name="name_new" placeholder="Название">
    </p>
    <p>
      <input type="file" name="file_new"  placeholder="Картинка">
    </p>
    <button name="updProduct">Обновить товар</button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
  include 'components/footer.php';
?>
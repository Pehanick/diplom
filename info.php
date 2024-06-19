<?php
  include 'components/core.php';
  include 'components/header.php';
  if (empty($_GET['product_id'])) {
    header('location: ./');
  }
  $product_datas = ($conn->query("SELECT * FROM `products` WHERE `id` = {$_GET['product_id']}"))->fetch_assoc();

  if (isset($_POST['delproduct'])) {
    $id = $product_datas["id"];
    $conn->query("DELETE FROM `products` WHERE `id` = $id");
    header('Location: veliks.php');
  }
  
  
  ?>
  <link rel="stylesheet" href="style/style.css" />
  <body>
    <div class="info-info">
        <div class="info-img">
            <?= '<img src="img/' .  $product_datas["img"] . '" alt="">'?>
        </div>
        <div class="info-text">
            <div class="info-name">
                <?= '<p class="na">' . $product_datas["img_name"] . '</p>'?>
            </div>
            <div class="info-price">
            <?= '<p class="na">' . $product_datas["img_price"] . " p" .'</p>'?>
            </div>
            <?php echo '<form action="add_to_cart.php?product_id=' . $product_datas['id'] .'" method="post"><button name="addtobusket">Добавить в корзину</button></form>'?>
            <?php if($_SESSION['user']['status'] == 1){
                echo '<form action="" method="post"><button name="delproduct">Удалить</button></form>';
                echo '<form action="upd.php?product_id=' . $product_datas['id'] .'" method="post"><button name="updproduct">Обновить</button></form>';
            }
            ?>
        </div>
    </div>
  </body>
  <?php
  include 'components/footer.php';
  ?>
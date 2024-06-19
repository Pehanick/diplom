<?php
  include 'components/core.php';
  include 'components/header.php';

    $statements = $conn->query("SELECT `cart`.*, `products`.*
        FROM `cart` 
            LEFT JOIN `products` ON `cart`.`product_id` = `products`.`id`
            WHERE `cart`.`user_id` = '{$_SESSION['user']['id']}';")
?>
 <link rel="stylesheet" href="style/style.css" />

 <main>
        <section class="statements">
            <?php foreach ($statements as $key => $value):?>
                <div>
                    <p>1: <?php echo '<img src="img/' .  $value["img"] . '" alt="">'?></p>
                    <p>2: <?= $value['img_name'] ?></p>
                    <p>3: <?= $value['img_price'] ?></p>
                    <hr>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
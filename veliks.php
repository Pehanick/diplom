<link rel="stylesheet" href="style/style.css" />
<?php
  include 'components/core.php';
  include 'components/header.php';
  ?>
  <div class="content">
    <div class="container">
        <div class="main-block">
         <div class="main-block-name">Наш ассоримент велосипедов</div>
          <div class="main-block-row">
          <?php
      $products_result = $conn->query("SELECT * FROM products");
      foreach ($products_result as $key => $value) {
        echo '<a href="info.php?product_id=' . $value['id'] . '"> <div class="kuka">
        <img src="img/' . $value['img'] . '"></a>
        <div class="desc">
          <div class="desc-header">Горный велосипед</div>
         <div class="desc-text">' . $value['img_name'] . '</div>
       </div>
       <div class="product-price">
         <div class="price-text">' . $value['img_price'] . " р" .'</div>
         <div class="to-card">
           <button>
             <img src="img/free-icon-shopping-cart-483283.png" alt="">
           </button>
         </div>
       </div>
     </div>';
      }
      ?>
        </div>
      </div>
    </div>
</div>
<?php
  include 'components/footer.php';
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <header>
    <div class="header">
      <div class="container">
        <div class="header-line">
          <div class="header-logo">
          <a href="index.php">
          <img src="components/logo.png" />
          </a>  
          </div>
          <div class="header-nav">
            <nav>
              <a class="nav-item" href="veliks.php">Велосипеды</a>
              <a class="nav-item" href="">Запчасти</a>
              <a class="nav-item" href="">О нас</a>
              <a class="nav-item" href="cart.php">Корзина</a>
            </nav>
          </div>
          <div class="header-aut">
            <div class="aut-img">
              <?php
                 if (isset($_SESSION['user'])) {
                  if ($_SESSION['user']['status'] == 1) {
                    echo ' <a href="logout.php">Выйти</a>';
                    echo ' <a href="admin_panel.php">Админ панель</a>';
                  }else{
                    echo ' <a href="logout.php">Выйти</a>';
                  }
                }else{
                  echo ' <a href="log.php">Войти</a>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
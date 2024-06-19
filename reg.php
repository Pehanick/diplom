<?php
include 'components/core.php';
include 'components/header.php';
if (isset($_POST['registr'])) {
  foreach ($_POST as $key => $value) {
    if ($key != 'registr') {
      if ($value == '') {
        $errors = "Все поля должны быть заполнены!";
      }
    }
  }
  if (!isset($errors)) {
    $password = md5($_POST['password']);
    $conn->query("INSERT INTO `users`(`name`, `login`, `email`, `password`) 
      VALUES ('{$_POST['name']}', '{$_POST['login']}', '{$_POST['email']}', '$password')");
  }
}
?>
<link rel="stylesheet" href="style/style.css">
<div class="content">
    <div class="container">
        <div class="kek">
          <div class="lul">
            <form action="reg.php" method="POST">
                <p>
                
                <input type="text" placeholder="Введите ваше имя" name="name">
                </p>
                <p>
                
                <input type="text" placeholder="Введите ваш логин" name="login">
                </p>
                <p>
                
                <input type="email" placeholder="Введите вашу почту" name="email">
                </p>
                <p>
               
                <input name="password" placeholder="Введите ваш пароль" type="password">
                </p>
                <button name="registr">Зарегистрируйтесь</button>
                <p>Есть аккаунт ? <a href="log.php">авторизируйтесь</a></p>
                <p>
                <?php
                if (isset($errors)) {
                    echo "<p>$errors</p>";
                }
                ?>
                </p>
            </form>
          </div>
        </div>
    </div>
</div>
<?php
  include 'components/footer.php';
  ?>
<?php
include 'components/core.php';
include 'components/header.php';
if (isset($_POST['log'])) {
  $password = md5($_POST['password']);
  $users = $conn->query("SELECT * FROM `users` WHERE `email` = '{$_POST['email']}' and `password` = '$password'");
  if ($users->num_rows > 0) {
    $user = $users->fetch_assoc();
    $_SESSION['user'] = [
      'id' => $user['id'],
      'status' => $user['status']
    ];
    header("Location: index.php");
  } else {
    $errors = "Пользователя с такими данными нет";
  }
}
?>
<link rel="stylesheet" href="style/style.css">
<div class="content">
    <div class="container">
    <div class="kek">
      <div class="lul">
      <form class="reg-aut-form" action="" method="post">
        <p>
          <input type="email" name="email" placeholder="Введите вашу почту">
        </p>
        <p>
          <input type="text" name="password" placeholder="Введите ваш пароль">
        </p>
        <?php
        if (isset($errors)) {
          echo "<p>$errors</p>";
        }
        ?>
        <button name="log">Авторизироваться</button>
        <p>Нет аккаунта ? <a href="reg.php">зарегистрируйтесь</a></p>
      </form>
    </div>
    </div>
  </div>
</div>
<?php
  include 'components/footer.php';
  ?>
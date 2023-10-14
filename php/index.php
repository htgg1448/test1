<?php
require_once __DIR__.'/boot.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Регистрация и вход</title>
  <link rel="icon" href="../img/icon.png">
  <link rel="stylesheet" href="/style/style.css">
</head>
<body>
  
        <?php if ($user) {?>
          <?php
        echo "<script> location.href='lk.php'; </script>";
        exit;
      ?>
        <?php } else { ?>

          <h1 class="mb-5">Регистрация</h1>

            <?php flash(); ?>

          <form method="post" action="do_register.php">
            <div class="mb-3">
              <label for="username" class="form-label">Никнейм</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Пароль</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-flex">
              <button type="submit" class="buy-button">Регистрация</button>
              <a class="btn-outline-primary" href="login.php">Логин</a>
            </div>
          </form>

        <?php } ?>

    </div>
  </div>
</div>

</body>
</html>

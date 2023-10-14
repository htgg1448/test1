<?php

require_once __DIR__.'/boot.php';

if (check_auth()) {
    header('Location: /');
    die;
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


      <h1 class="mb-5">Вход</h1>

        <?php flash() ?>

      <form method="post" action="do_login.php">
        <div class="mb-3">
          <label for="username" class="form-label">Никнейм</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-flex">
          <button type="submit" class="buy-button">Вход</button>
          <a class="btn btn-outline-primary" href="index.php">Регистрация</a>
        </div>
      </form>

    </div>
  </div>
</div>

</body>
</html>

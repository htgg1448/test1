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
  <title>Личный кабинет</title>
  <link rel="icon" href="../img/icon.png">
  <link rel="stylesheet" href="/style/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header"> 
            <div class="container">
                <div class="header__body">
                    <a href="../index.html" class="header__logo">
                        <p>HC</p>
                    </a>
                        <div class="header__burger">
                            <span></span>
                        </div>
                        <nav class="header__menu">
                            <ul class="header__list">
                                <li>
                                    <a href="/index.html" class="header__link">Главная</a>
                                </li>
                                <li>
                                    <a onclick="document.location='/pages/katalog.html'" class="header__link">Каталог</a>
                                </li>
                                <li>
                                    <a onclick="document.location='/pages/faq.html'" class="header__link">FAQ</a>
                                </li>
                                <li>
                                    <a onclick="document.location='/pages/support.html'" class="header__link">Поддержка</a>
                                </li>
                                <li>
                                    <a onclick="document.location='/php/index.php'" class="header__link">Личный кабинет</a>
                                </li>
                            </ul>    
                        </nav>
                </div>
            </div>
        </header>
    </div>

      <div class="container">
        <div class="content-index" style="text-align: center; font-size: 30px">
          <p style="font-weight: bold;">Рады снова вас видеть, <span class="blink"><?=htmlspecialchars($user['username'])?>!<span><p>
        </div>
    </div>


    <form action="form.php" method="post" name="forma">
        <p style="color: #fff; padding-bottom:20px; font-size:28px">Добавьте ваш Email:</p>
        <input type="text" name="email" class="form-control"><br/>
        <br/>
           <input class="buy-button" id="submit" type="submit" value="Добавить"><br/>
    </form>
            
    <form class="mt-5" method="post" action="do_logout.php">
        <button type="submit" class="buy-button" style="margin-top:150px;">Выйти</button>
    </form>

</body>
</html>
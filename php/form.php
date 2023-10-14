<?php
// Подключение к базе данных
$host = '127.0.0.1'; // Укажите адрес сервера базы данных
$dbname = 'hilkevich'; // Укажите имя базы данных
$username = 'root'; // Укажите ваше имя пользователя базы данных
$password = ''; // Укажите ваш пароль базы данных

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Обработка данных из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Проверка, существует ли уже такие данные в базе
    $sql = "SELECT * FROM info WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $existingemail = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingemail) {
        echo "<script> location.href='lkemail.php'; </script>";
        exit;
    } else {
        // Если данных нет, добавляем их в базу данных
        $insertSql = "INSERT INTO info (email) VALUES (:email)";
        $insertStmt = $pdo->prepare($insertSql);
        $insertStmt->bindParam(':email', $email, PDO::PARAM_STR);

        if ($insertStmt->execute()) {
            echo "<script> location.href='lkemail.php'; </script>";
            exit;
        } else {
            echo "Произошла ошибка при добавлении данных.";
        }
    }
}
?>
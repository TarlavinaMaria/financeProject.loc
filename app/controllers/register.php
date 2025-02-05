<!-- Обработка действий страницы регистрации -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (empty($name) || empty($email) || empty($password)) {
        die("Пожалуйста, заполните все поля.");
    }

    // Проверка существования пользователя
    $result = $db->query("SELECT User_id FROM Users WHERE Email = ?", [$email]);
    if ($result === false) {
        abort(500);
        exit();
    }

    if ($result->find()) {
        echo ("Email уже зарегистрирован.");
        header("Location: login");
        exit();
    }

    // Хеширование пароля
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Вставка пользователя в базу данных
    if ($db->query("INSERT INTO Users (Name, Email, Password) VALUES (?, ?, ?)", [$name, $email, $hashedPassword])) {
        header("Location: login");
        exit();
    } else {
        die("Ошибка при регистрации.");
    }
}

require_once(VIEWS . '/register.tmpl.php');
?>
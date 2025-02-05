<!-- Обработка действий страницы входа -->
<?php

$errors = []; // Массив для хранения ошибок

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password'], PASSWORD_DEFAULT));

    // Валидация ввода
    if (empty($email) || empty($password)) {
        die("Пожалуйста, заполните все поля.");
    }

    // Проверка существования пользователя
    $result = $db->query("SELECT * FROM Users WHERE Email = ?", [$email]);

    if ($result === false) {
        abort(500);
    }

    $user = $result->find();

    if (!$user) {
        $errors[] = "Пользователь не найден.";
        
        // header("Location: register");
    }
    if (!$errors) {
        // Проверка пароля
        if (password_verify($password, $user['Password'])) {
            // Успешный вход
            session_start();
            $_SESSION['user_id'] = $user['User_id']; // Сохраняем ID пользователя в сессии
            $_SESSION['username'] = $user['Name']; // Сохраняем имя пользователя
            // echo "Вы успешно вошли!";

            // Перенаправление на главную страницу дневника
            header("Location: diary");
        } else {
            $errors[] = "Неверный пароль.";
        }
    }

}
require_once(VIEWS . '/login.tmpl.php');
?>
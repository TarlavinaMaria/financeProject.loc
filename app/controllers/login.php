<!-- Обработка действий страницы входа -->

<?php
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
        echo ("Пользователь не найден.");
        header("Location: register");
    }

    // Проверка пароля
    if (password_verify($password, $user['Password'])) {
        // Успешный вход
        session_start();
        $_SESSION['user_id'] = $user['User_id']; // Сохраняем ID пользователя в сессии
        $_SESSION['username'] = $user['Name']; // Сохраняем имя пользователя
        // echo "Вы успешно вошли!";

        // Перенаправление на главную страницу
        header("Location: diary");
    } else {
        die("Неверный пароль.");
    }

}
require_once(VIEWS . '/login.tmpl.php');
?>
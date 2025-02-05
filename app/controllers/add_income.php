<!-- Обработка действий страницы добавления дохода -->

<?php
session_start();

$user_id = $_SESSION['user_id'];

// Извлечение категорий из базы данных
$result = $db->query("SELECT CategoryName FROM Category WHERE TypeCategory = 1");
$categories = $result->findAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $sum = htmlspecialchars(trim($_POST['sum']));
    $category_name = htmlspecialchars(trim($_POST['category']));
    $date = htmlspecialchars(trim($_POST['date']));
    $comment = htmlspecialchars(trim($_POST['comment']));

    // Получаем ID категории
    $category = $db->query("SELECT Category_id FROM Category WHERE CategoryName = ?", [$category_name])->find();

    if ($category) {
        $category_id = $category['Category_id'];

        // Сохранение данных в базу данных с использованием подготовленного выражения
        $stmt = $db->query("INSERT INTO Action (Category, Sum, Date, Comment, User_id) VALUES (?, ?, ?, ?, ?)", [$category_id, $sum, $date, $comment, $user_id]);

        // Проверка успешности выполнения запроса
        if ($stmt) {

            header('Location: wallet');
            exit;
        } else {
            echo "Ошибка при добавлении дохода.";
        }
    } else {
        echo "Категория не найдена.";
    }
}

require_once(VIEWS . '/add_income.tmpl.php');
?>
<?php
session_start();

$user_id = $_SESSION['user_id'];

// Обработка GET-запроса для отображения формы редактирования
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $action_id = $_GET['id'];

    // Получение данных действия по ID
    $action = $db->query("SELECT * FROM Action WHERE Action_id = ?", [$action_id])->find();

    if (!$action) {
        $errors[] = "Запись не найдена.";
    }

    // Получение всех категорий для выпадающего списка
    $categories = $db->query("SELECT * FROM Category")->findAll();

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка POST-запроса для сохранения изменений
    $action_id = $_POST['id'];
    $sum = $_POST['sum'];
    $date = $_POST['date'];
    $comment = $_POST['comment'];
    $category = $_POST['category'];

    // Обновление записи в базе данных
    $db->query("UPDATE Action SET Sum = ?, Date = ?, Comment = ?, Category = ? WHERE Action_id = ? AND User_id = ?", [$sum, $date, $comment, $category, $action_id, $user_id]);

    // Перенаправление на страницу анализа бюджета после успешного обновления
    header("Location: budget_analysis");
    exit;
}

// Подключение к шаблону
require_once(VIEWS . '/edit_action.tmpl.php');
?>
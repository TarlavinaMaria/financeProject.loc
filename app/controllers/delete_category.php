<?php
session_start();

$errors = []; // Массив для хранения ошибок

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $category_id = (int) $_GET['id'];
    // Получаем информацию о категории для подтверждения удаления
    $category = $db->query("SELECT * FROM Category WHERE Category_id = ?", [$category_id])->find();

    if (!$category) {
        $errors[] = "Категория не найдена.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Обработка удаления категории
    $category_id = (int) $_POST['id'];
    $db->query("DELETE FROM Category WHERE Category_id = ?", [$category_id]);
    header("Location: add_category");
    exit;
}

// Подключите шаблон для отображения формы подтверждения
require_once(VIEWS . '/delete_category.tmpl.php');
?>
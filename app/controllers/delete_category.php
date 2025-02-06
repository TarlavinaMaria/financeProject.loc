<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = (int) $_POST['category_id'];

    // Удаление категории из базы данных
    $stmt = $db->query("DELETE FROM Category WHERE Category_id = ?", [$category_id]);

    if ($stmt) {
        header('Location: add_category');
        exit;
    } else {
        // Обработка ошибки, если удаление не удалось
        $_SESSION['errors'][] = "Ошибка при удалении категории.";
        header('Location: add_category');
        exit;
    }
}
require_once(VIEWS . '/delete_category.tmpl.php');
?>
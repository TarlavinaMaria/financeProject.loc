<!-- Обработка действий страницы удаления -->

<?php
session_start();

$errors = []; // Массив для хранения ошибок

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $action_id = $_GET['id'];
    $action = $db->query("SELECT a.*, c.CategoryName 
                           FROM Action a 
                           JOIN Category c ON a.Category = c.Category_id 
                           WHERE a.Action_id = ?", [$action_id])->find();

    if (!$action) {
        $errors[] = "Запись не найдена.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Обработка удаления записи
    $action_id = $_POST['id'];
    $db->query("DELETE FROM Action WHERE Action_id = ?", [$action_id]);
    header("Location: budget_analysis");
    exit;
}
require_once(VIEWS . '/delete_action.tmpl.php');
?>
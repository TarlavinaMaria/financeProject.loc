<!-- Обработка действий страницы редактирования -->

<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $action_id = $_GET['id'];
    $action = $db->query("SELECT * FROM Action WHERE Action_id = ?", [$action_id])->find();

    if (!$action) {
        die("Запись не найдена.");
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка изменения записи
    $action_id = $_POST['id'];
    $sum = $_POST['sum'];
    $comment = $_POST['comment'];

    $db->query("UPDATE Action SET Sum = ?, Comment = ? WHERE Action_id = ?", [$sum, $comment, $action_id]);
    header("Location: budget_analysis");
    exit;
}

require_once(VIEWS . '/edit_action.tmpl.php');
?>
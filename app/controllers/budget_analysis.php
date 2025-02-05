<!-- Обработка действий страницы анализа -->

<?php
session_start();

$user_id = $_SESSION['user_id'];

// Получение всех действий пользователя
$actions = $db->query("
    SELECT a.*, c.CategoryName 
    FROM Action a 
    JOIN Category c ON a.Category = c.Category_id 
    WHERE a.User_id = ? 
    ORDER BY a.Date DESC", [$user_id])->findAll();

require_once(VIEWS . '/budget_analysis.tmpl.php');
?>
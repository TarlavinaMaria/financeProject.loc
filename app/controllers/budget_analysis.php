<!-- Обработка действий страницы анализа -->

<?php
session_start();

$user_id = $_SESSION['user_id'];

// Проверка, были ли отправлены даты
$start_date = $_POST['start_date'] ?? null;
$end_date = $_POST['end_date'] ?? null;

// Формирование условия для запроса
$date_condition = '';
$params = [$user_id];

if ($start_date && $end_date) {
    $date_condition = "AND a.Date BETWEEN ? AND ?";
    $params[] = $start_date;
    $params[] = $end_date;
}

// Получение всех действий пользователя с учетом дат
$actions = $db->query("
    SELECT a.*, c.CategoryName 
    FROM Action a 
    JOIN Category c ON a.Category = c.Category_id 
    WHERE a.User_id = ? $date_condition 
    ORDER BY a.Date DESC", $params)->findAll();

require_once(VIEWS . '/budget_analysis.tmpl.php');
?>
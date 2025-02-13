<!-- Обработка действий страницы анализа -->

<?php
session_start();

$user_id = $_SESSION['user_id'];

// Проверка, были ли отправлены даты
$start_date = $_POST['start_date'] ?? null;
$end_date = $_POST['end_date'] ?? null;
$type = $_POST['type'] ?? null;// Тип операции (доход или расход)
$category = $_POST['category'] ?? null; // Категория

// Получение всех категорий
$categories = $db->query("SELECT * FROM Category")->findAll();

// Формирование условия для запроса
$date_condition = '';
$type_condition = '';
$category_condition = '';
$params = [$user_id];

if ($start_date && $end_date) {
    $date_condition = "AND a.Date BETWEEN ? AND ?";
    $params[] = $start_date;
    $params[] = $end_date;
}
if ($type !== null && $type !== '') {
    $type_condition = "AND c.TypeCategory = ?";
    $params[] = $type;
}
if ($category !== null && $category !== '') {
    $category_condition = "AND a.Category = ?";
    $params[] = $category;
}

// Получение всех действий пользователя с учетом дат и типа операции
$actions = $db->query("
    SELECT a.*, c.CategoryName 
    FROM Action a 
    JOIN Category c ON a.Category = c.Category_id 
    WHERE a.User_id = ? $date_condition $type_condition $category_condition
    ORDER BY a.Date DESC", $params)->findAll();


require_once(VIEWS . '/budget_analysis.tmpl.php');
?>
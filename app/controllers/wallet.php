<?php
session_start();

$user_id = $_SESSION['user_id'];

// Загрузка последних действий из базы данных с JOIN для получения названия категории
$action = $db->query("
    SELECT *
    FROM Action a 
    JOIN Category c ON a.Category = c.Category_id 
    WHERE a.User_id = ? 
    ORDER BY a.Date DESC 
    LIMIT 5", [$user_id])->findAll();


// Получение суммы всех доходов
$total_income = $db->query("SELECT SUM(Sum) AS total FROM Action WHERE User_id = ? AND Sum > 0", [$user_id])->find();
$total_income = $total_income['total'] ?? 0; // Если нет доходов, устанавливаем 0

// Получение суммы всех расходов
$total_expense = $db->query("SELECT SUM(Sum) AS total FROM Action WHERE User_id = ? AND Sum < 0", [$user_id])->find();
$total_expense = $total_expense['total'] ?? 0; // Если нет расходов, устанавливаем 0

// Вычисление реального баланса
$balance = $total_income + $total_expense;



require_once(VIEWS . '/wallet.tmpl.php');

?>
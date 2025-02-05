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

require_once(VIEWS . '/wallet.tmpl.php');

?>
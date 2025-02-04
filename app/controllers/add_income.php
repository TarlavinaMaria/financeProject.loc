<?php
session_start();

// Извлечение категорий из базы данных
$result = $db->query("SELECT CategoryName FROM Category WHERE TypeCategory = 1");
$categories = $result->findAll();

require_once(VIEWS . '/add_income.tmpl.php');
?>
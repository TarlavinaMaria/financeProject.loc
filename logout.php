<?php
session_start(); // Начинаем сессию

// Удаляем все данные сессии
$_SESSION = [];

// Уничтожаем сессию
session_destroy();

// Перенаправляем на страницу входа или главную страницу
header("Location: index.php");
exit();
?>
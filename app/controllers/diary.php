<?php
session_start(); // Начинаем сессию

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once(VIEWS . "/diary.tmpl.php");
?>
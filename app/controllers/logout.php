<!-- Обработка действий выход -->

<?php
session_start(); // Начинаем сессию

// Удаляем все данные сессии
$_SESSION = [];

// Уничтожаем сессию
session_destroy();

header("Location: index");
exit();
?>
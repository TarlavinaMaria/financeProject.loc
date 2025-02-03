<?php
session_start(); // Начинаем сессию

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой дневник</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Включение оглавления -->
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Мой дневник</h1>
        <p>Это ваш личный дневник для учета доходов и расходов.</p>
        <p>Здесь вы можете отслеживать свои финансы и записывать свои мысли.</p>
        <h2>Учет настроения</h2>
        <p>Записывайте свое настроение каждый день.</p>
        <!-- Здесь можно добавить форму или функциональность для учета настроения -->
    </div>

    <!-- Включение подвала -->
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
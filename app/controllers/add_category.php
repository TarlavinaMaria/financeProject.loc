<!-- Обработка действий страницы добавления категорию -->

<?php
session_start();


// Загрузка категорий доходов из базы данных
$income_categories = $db->query("SELECT * FROM Category WHERE TypeCategory = 1")->findAll();
$expense_categories = $db->query("SELECT * FROM Category WHERE TypeCategory = 0")->findAll();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = htmlspecialchars(trim($_POST['category_name']));
    $type_category = (int) $_POST['type_category']; // Приводим к целому числу с использованием (int)

    // Проверка на существование категории
    $existing_category = $db->query("SELECT * FROM Category WHERE CategoryName = ? AND TypeCategory = ?", [$category_name, $type_category])->find();
    if ($existing_category) {
        echo "Категория с таким названием уже существует.";
    } else {
        // Сохранение новой категории в базу данных
        $stmt = $db->query("INSERT INTO Category (CategoryName, TypeCategory) VALUES (?, ?)", [$category_name, $type_category]);

        if ($stmt) {
            header('Location: add_category'); // Перенаправление на страницу кошелька
            exit;
        } else {
            echo "Ошибка при добавлении категории.";
        }
    }
}

// Подключите шаблон для отображения формы
require_once(VIEWS . '/add_category.tmpl.php');
?>
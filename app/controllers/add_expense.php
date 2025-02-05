<!-- Обработка действий страницы добавления расхода -->

<?php
session_start();

$user_id = $_SESSION['user_id'];

$errors = []; // Массив для хранения ошибок

// Извлечение категорий из базы данных
$result = $db->query("SELECT CategoryName FROM Category WHERE TypeCategory = 0");
$categories = $result->findAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $sum = htmlspecialchars(trim($_POST['sum']));
    $sum = -$sum;
    $category_name = htmlspecialchars(trim($_POST['category']));
    $date = htmlspecialchars(trim($_POST['date']));
    $comment = htmlspecialchars(trim($_POST['comment']));

    // Если дата не выбрана, устанавливаем её на текущую дату
    if (empty($date)) {
        $date = date('Y-m-d'); // Формат даты: ГГГГ-ММ-ДД
    }

    // Получаем ID категории
    $category = $db->query("SELECT Category_id FROM Category WHERE CategoryName = ?", [$category_name])->find();

    if ($category) {
        $category_id = $category['Category_id'];

        // Сохранение данных в базу данных с использованием подготовленного выражения
        $stmt = $db->query("INSERT INTO Action (Category, Sum, Date, Comment, User_id) VALUES (?, ?, ?, ?, ?)", [$category_id, $sum, $date, $comment, $user_id]);

        // Проверка успешности выполнения запроса
        if ($stmt) {

            header('Location: wallet');
            exit;
        } else {
            $errors[] = "Ошибка при добавлении дохода.";
        }
    } else {
        $errors[] = "Категория не найдена.";
    }
}

require_once(VIEWS . '/add_income.tmpl.php');
?>
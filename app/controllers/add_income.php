<?php
session_start();

$user_id = $_SESSION['user_id'];
$errors = []; // Массив для хранения ошибок

// Обработка GET-запроса для отображения формы редактирования
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $action_id = $_GET['id'];

    // Получение данных действия по ID
    $action = $db->query("SELECT a.*, c.CategoryName 
                           FROM Action a 
                           JOIN Category c ON a.Category = c.Category_id 
                           WHERE a.Action_id = ? AND a.User_id = ?", [$action_id, $user_id])->findOne();

    if (!$action) {
        die("Запись не найдена.");
    }

    // Получение всех категорий для выпадающего списка
    $categories = $db->query("SELECT * FROM Category WHERE User_id = ?", [$user_id])->findAll();

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка POST-запроса для сохранения изменений
    $action_id = $_POST['id'];
    $sum = htmlspecialchars(trim($_POST['sum']));
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

        // Обновление данных в базе данных с использованием подготовленного выражения
        $stmt = $db->query("UPDATE Action SET Category = ?, Sum = ?, Date = ?, Comment = ? WHERE Action_id = ? AND User_id = ?", [$category_id, $sum, $date, $comment, $action_id, $user_id]);

        // Проверка успешности выполнения запроса
        if ($stmt) {
            header('Location: budget_analysis.php');
            exit;
        } else {
            $errors[] = "Ошибка при обновлении действия.";
        }
    } else {
        $errors[] = "Категория не найдена.";
    }
}

// Подключение к шаблону
require_once(VIEWS . '/edit_action.tmpl.php');
?>
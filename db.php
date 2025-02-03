<?php
$host = 'MySQL-8.2';
$db = 'finance_db';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected to database";
} catch (PDOException $e) {
    echo "Соединение не установлено: " . $e->getMessage();
}
?>
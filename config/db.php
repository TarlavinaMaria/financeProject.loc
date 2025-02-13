<!-- Конфигурация для подключения к БД -->

<?php
// Для MySQL
// return [
//     'host' => 'MySQL-8.2',
//     'dbname' => 'finance_db_test',
//     'username' => 'root',
//     'password' => '',
//     'charset' => 'utf8',
//     'options' => [
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     ]
// ]

// Для SQLite
return [
    'path' => __DIR__ . '/../database.sqlite', // Путь к файлу базы данных SQLite
];
?>
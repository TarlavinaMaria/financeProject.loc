<!-- Класс для работы с БД -->

<?php

class DB
{
    private $conn;
    private PDOStatement $stmt;
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConnection(array $db_config)
    {
        // Для MySQL строка
        // $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}"; // соединение с БД

        // Для SQLite строка
        $dsn = "sqlite:{$db_config['path']}"; // соединение с БД SQLite

        // Подключение к БД
        try {
            // Для MySQL 
            // $this->conn = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
            // return $this;

            // Для SQLite
            $this->conn = new PDO($dsn);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Установка режима ошибок
            return $this;
        } catch (PDOException $e) {
            abort(500);
        }
    }
    public function query($query, $params = [])
    {
        try {
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->execute($params);
        } catch (PDOException $e) {
            return false;
        }
        return $this;
    }
    public function findAll()
    {
        return $this->stmt->fetchAll();
    }
    public function find()
    {
        return $this->stmt->fetch();
    }
    public function findOrAbort()
    {
        $res = $this->find();
        if (!$res) {
            abort(404);
        }
        return $res;
    }

}


?>
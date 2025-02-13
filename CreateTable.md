```sql
--- Создание таблиц для базы данных MySQL

-- Создание таблицы `Users`
CREATE TABLE `Users` (
  `User _id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL UNIQUE,
  `Password` varchar(255) NOT NULL,
  `Created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`User _id`)
);

-- Создание таблицы `Category`
CREATE TABLE `Category` (
  `Category_id` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `TypeCategory` tinyint(1) NOT NULL COMMENT '1 - доходы, 0 - расходы',
  `User _id` int NOT NULL,
  PRIMARY KEY (`Category_id`),
  FOREIGN KEY (`User _id`) REFERENCES `Users` (`User _id`) ON DELETE CASCADE
);

-- Создание таблицы `Action`
CREATE TABLE `Action` (
  `Action_id` int NOT NULL AUTO_INCREMENT,
  `Category` int NOT NULL,
  `Sum` decimal(10,0) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Comment` text,
  `User _id` int NOT NULL,
  PRIMARY KEY (`Action_id`),
  KEY `Category` (`Category`),
  CONSTRAINT `action_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `Category` (`Category_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`User _id`) REFERENCES `Users` (`User _id`) ON DELETE CASCADE
);
```

```sql lite
-- Создание таблиц для базы данных SQLite

-- Включение поддержки внешних ключей
PRAGMA foreign_keys = ON;

-- Создание таблицы `Users`
CREATE TABLE `Users` (
  `User _id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `Name` TEXT NOT NULL,
  `Email` TEXT NOT NULL UNIQUE,
  `Password` TEXT NOT NULL,
  `Created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Создание таблицы `Category`
CREATE TABLE `Category` (
  `Category_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `CategoryName` TEXT NOT NULL,
  `TypeCategory` INTEGER NOT NULL, -- 1 - доходы, 0 - расходы
  `User _id` INTEGER NOT NULL, -- Добавлено поле для связи с пользователем
  FOREIGN KEY (`User _id`) REFERENCES `Users` (`User _id`) ON DELETE CASCADE
);

-- Создание таблицы `Action`
CREATE TABLE `Action` (
  `Action_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `Category` INTEGER NOT NULL,
  `Sum` REAL NOT NULL, -- Используем REAL для поддержки дробных чисел
  `Date` DATETIME DEFAULT NULL,
  `Comment` TEXT,
  `User _id` INTEGER NOT NULL,
  FOREIGN KEY (`Category`) REFERENCES `Category` (`Category_id`),
  FOREIGN KEY (`User _id`) REFERENCES `Users` (`User _id`) ON DELETE CASCADE
);
```

-- Примеры для

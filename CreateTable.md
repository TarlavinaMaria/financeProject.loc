```sql

-- База данных: `finance_db`
--
CREATE DATABASE IF NOT EXISTS `finance_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `finance_db`;

-- --------------------------------------------------------

--
-- Структура таблицы `Action`
--
CREATE TABLE `Action` (
  `Action_id` int NOT NULL,
  `Category` int NOT NULL,
  `Sum` decimal(10,0) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Comment` text,
  `User_id` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `Category_id` int NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `TypeCategory` tinyint(1) NOT NULL COMMENT '1 - доходы, 0 - расходы'
) ;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `User_id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Action`
--
ALTER TABLE `Action`
  ADD PRIMARY KEY (`Action_id`),
  ADD KEY `Category` (`Category`),
  ADD KEY `fk_user` (`User_id`);

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Action`
--
ALTER TABLE `Action`
  MODIFY `Action_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `User_id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Action`
--
ALTER TABLE `Action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `Category` (`Category_id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`User_id`) REFERENCES `Users` (`User_id`) ON DELETE CASCADE;


-- --------------------------------------------------------
```

```sql lite
-- Создание таблиц для базы данных SQLite

-- Структура таблицы `Action`
CREATE TABLE IF NOT EXISTS `Action` (
  `Action_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `Category` INTEGER NOT NULL,
  `Sum` DECIMAL(10,0) NOT NULL,
  `Date` DATETIME DEFAULT NULL,
  `Comment` TEXT,
  `User_id` INTEGER NOT NULL,
  FOREIGN KEY (`Category`) REFERENCES `Category` (`Category_id`),
  FOREIGN KEY (`User_id`) REFERENCES `Users` (`User_id`) ON DELETE CASCADE
);

-- --------------------------------------------------------

-- Структура таблицы `Category`
CREATE TABLE IF NOT EXISTS `Category` (
  `Category_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `CategoryName` TEXT NOT NULL,
  `TypeCategory` INTEGER NOT NULL CHECK (TypeCategory IN (0, 1)) -- 1 - доходы, 0 - расходы
);

-- --------------------------------------------------------

-- Структура таблицы `Users`
CREATE TABLE IF NOT EXISTS `Users` (
  `User_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `Name` TEXT NOT NULL,
  `Email` TEXT NOT NULL UNIQUE,
  `Password` TEXT NOT NULL,
  `Created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

```

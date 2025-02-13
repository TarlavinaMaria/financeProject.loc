```sql
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
  PRIMARY KEY (`Category_id`)
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
  KEY `fk_user` (`User _id`),
  CONSTRAINT `action_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `Category` (`Category_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`User _id`) REFERENCES `Users` (`User _id`) ON DELETE CASCADE
);
```

# Проект "Кошелек"

## Описание

"Кошелек" — это веб-приложение для учета доходов и расходов, разработанное с использованием PHP, HTML, CSS и MySQL(SQLite). Приложение предоставляет пользователям удобный интерфейс для эффективного управления личными финансами, позволяя отслеживать доходы, расходы и категории трат.

## Установка

1. Убедитесь, что у вас установлен PHP (версия 8.3).
2. Убедитесь, что у вас установлен веб-сервер (Open Server Panel).
3. Убедитесь, что у вас установлен SQLite (если вы используете SQLite в качестве базы данных).
4. Создайте файл database.sqlite для SQLite базы.
5. Для создания необходимых таблиц в базе данных SQL-скрипт находится в файле CreateTable.md для нужной вам базы.

## Объекты и их взаимодействия

1.  **Пользователь**:
    - Человек, использующий приложение для учета личных финансов.
    - Имеет уникальные данные для входа: имя пользователя, пароль и адрес электронной почты.
2.  **Запись дохода/расхода**:
    - Содержит информацию о финансовых операциях пользователя.
    - Включает следующие данные:
      - Сумма
      - Дата
      - Категория
      - Описание
    - Может быть помечена как "доход" или "расход".
3.  **Категория**:
    - Классификация записей доходов и расходов для удобства анализа.
    - Примеры категорий: "Еда", "Транспорт", "Зарплата".
    - Пользователь может добавлять и удалять категории.
4.  **Баланс**:
    - Текущая сумма денежных средств пользователя.
    - Автоматически рассчитывается как разница между доходами и расходами.
    - Обновляется в режиме реального времени при добавлении или изменении записей.
5.  **Анализ бюджета**:
    - Раздел для подробного анализа финансовых данных.
    - Позволяет просматривать все записи, сортировать их по дате.
    - Предоставляет возможность изменения или удаления существующих записей.

## Основные процессы

- **Регистрация и вход**: Пользователь регистрируется в системе и входит в свой аккаунт для доступа к функциям учета финансов.
- **Управление записями**: Пользователь может добавлять, редактировать и удалять записи о доходах и расходах, указывая сумму, дату, категорию и описание операции. Также, пользователь может управлять категориями, добавляя новые и удалять ненужные.
- **Просмотр и анализ**: Пользователь может просматривать список последних записей о доходах и расходах, а также анализировать свои финансы, получая информацию о структуре расходов и доходов за определенные периоды.

## Будущие наработки

Проект "Кошелек" планируется как основа для более крупного проекта под названием "Мой дневник". "Мой дневник" будет включать в себя следующие функции:

- Ведение записей о событиях.
- Постановка и мониторинг целей.
- Запись заметок и идей.

Все эти функции будут интегрированы с функциональностью "Кошелька" для обеспечения комплексного подхода к управлению личной жизнью.

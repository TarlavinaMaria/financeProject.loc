<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой дневник</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/main.css">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid container">
                    <a class="navbar-brand" href="#">
                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Неизвестно'; ?></a>
                    <!-- Добавить ссылку на профиль в href="profile.php"-->
                    </button>
                    <div class=" collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="diary">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Мой дневник</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Мои заметки</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wallet">Кошелек</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout">Выход</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
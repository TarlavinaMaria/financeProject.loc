<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Неизвестно'; ?></a>
    <!-- Добавить ссылку на профиль в href="profile.php"-->
    </button>
    <div class=" collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="diary">Мой дневник</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Учет доходов</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Учет расходов</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">Выход</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Форма дохода -->

<?php require(COMPONENTS . "/header.php"); ?>
<main class="main py-3">
    <div class="container">
        <h1>Добавить Доход</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="sum">Сумма (₽):</label>
                <input type="number" id="sum" name="sum" required class="form-control" step="1" min="0">
            </div>

            <div class="form-group">
                <label for="category">Категория:</label>
                <select id="category" name="category" required class="form-control">
                    <option value="">Выберите категорию</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category['CategoryName']); ?>">
                            <?php echo htmlspecialchars($category['CategoryName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Дата:</label>
                <input type="date" id="date" name="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="comment">Комментарии:</label>
                <textarea id="comment" name="comment" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Добавить доход</button>
            <a href="wallet" class="btn btn-secondary">Назад</a>
        </form>
    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
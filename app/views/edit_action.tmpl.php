<!-- Форма редактирования действия -->
<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Редактирование действия</h1>
        <form method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($action['Action_id']); ?>">

            <div class="mb-3">
                <label for="category" class="form-label">Категория:</label>
                <select id="category" name="category" class="form-select" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category['Category_id']); ?>" <?php echo ($category['Category_id'] == $action['Category']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['CategoryName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="sum" class="form-label">Сумма:</label>
                <input type="number" id="sum" name="sum" class="form-control"
                    value="<?php echo htmlspecialchars($action['Sum']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Дата:</label>
                <input type="date" id="date" name="date" class="form-control"
                    value="<?php echo htmlspecialchars(date('Y-m-d', strtotime($action['Date']))); ?>" required>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий:</label>
                <input type="text" id="comment" name="comment" class="form-control"
                    value="<?php echo htmlspecialchars($action['Comment']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <a href="/budget_analysis" class="btn btn-secondary">Назад</a>
        </form>
    </div>
    <!-- Отображение ошибок -->
    <?php if (!empty($errors)): ?>
        <div class="alert text-danger mt-3">
            <ul class="list-unstyled">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
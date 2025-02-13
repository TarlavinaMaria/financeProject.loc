<!-- Форма анализа бюджета -->
<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Анализ бюджета</h1>

        <a href="wallet" class="btn btn-secondary mb-3">Назад</a>

        <!-- Форма для поиска по датам, типу операции и категории -->
<form method="POST" class="mb-3">
    <div class="form-row align-items-end">
        <div class="col-auto">
            <label for="start_date">Начальная дата:</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
                value="<?php echo htmlspecialchars($start_date); ?>">
        </div>
        <div class="col-auto">
            <label for="end_date">Конечная дата:</label>
            <input type="date" name="end_date" id="end_date" class="form-control"
                value="<?php echo htmlspecialchars($end_date); ?>">
        </div>
        <div class="col-auto">
            <label for="type">Тип операции:</label>
            <select name="type" id="type" class="form-control">
                <option value="">Все</option>
                <option value="1" <?php echo (isset($_POST['type']) && $_POST['type'] == '1') ? 'selected' : ''; ?>>Доход</option>
                <option value="0" <?php echo (isset($_POST['type']) && $_POST['type'] == '0') ? 'selected' : ''; ?>>Расход</option>
            </select>
        </div>
        <div class="col-auto">
            <label for="category">Категория:</label>
            <select name="category" id="category" class="form-control">
                <option value="">Все категории</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category['Category_id']); ?>"
                        <?php echo (isset($_POST['category']) && $_POST['category'] == $category['Category_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['CategoryName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Найти</button>
            <a href="budget_analysis" class="btn btn-secondary">Отмена</a>
        </div>
    </div>
</form>

        <h3>Все действия</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Категория</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                    <th>Комментарий</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($actions)): ?>
                    <?php foreach ($actions as $action): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($action['CategoryName']); ?></td>
                            <td><?php echo htmlspecialchars($action['Sum']); ?> ₽</td>
                            <td><?php echo htmlspecialchars(date('d.m.Y', strtotime($action['Date']))); ?></td>
                            <td><?php echo htmlspecialchars($action['Comment']); ?></td>
                            <td>
                                <a href="/edit_action?id=<?php echo $action['Action_id']; ?>"
                                    class="btn btn-warning btn-sm">Изменить</a>
                                <a href="/delete_action?id=<?php echo $action['Action_id']; ?>"
                                    class="btn btn-danger btn-sm">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Нет данных для отображения</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
<!-- Форма удаления действия -->

<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Подтверждение удаления записи</h1>
        <p>Вы уверены, что хотите удалить следующую запись?</p>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Категория</th>
                <td><?php echo htmlspecialchars($action['CategoryName']); ?></td>
            </tr>
            <tr>
                <th>Сумма</th>
                <td><?php echo htmlspecialchars($action['Sum']); ?> ₽</td>
            </tr>
            <tr>
                <th>Дата</th>
                <td><?php echo htmlspecialchars($action['Date']); ?></td>
            </tr>
            <tr>
                <th>Комментарий</th>
                <td><?php echo htmlspecialchars($action['Comment']); ?></td>
            </tr>
        </table>
        <form method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?php echo $action['Action_id']; ?>">
            <button type="submit" class="btn btn-danger">Удалить</button>
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
<!-- Форма анализа бюджета -->

<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Анализ бюджета</h1>

        <a href="wallet" class="btn btn-secondary mb-3">Назад</a>

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
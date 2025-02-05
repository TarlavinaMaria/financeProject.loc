<!-- Форма редактирования действия -->

<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $action['Action_id']; ?>">
            <div>
                <label>Сумма:</label>
                <input type="text" name="sum" value="<?php echo htmlspecialchars($action['Sum']); ?>" required>
            </div>
            <div>
                <label>Комментарий:</label>
                <input type="text" name="comment" value="<?php echo htmlspecialchars($action['Comment']); ?>" required>
            </div>
            <button type="submit">Сохранить изменения</button>
            <a href="budget_analysis" class="btn btn-secondary">Назад</a>
        </form>
    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
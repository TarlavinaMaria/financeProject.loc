<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Подтверждение удаления категории</h1>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Вы уверены, что хотите удалить категорию "<?php echo htmlspecialchars($category['CategoryName']); ?>"?</p>
            <form action="delete_category" method="post">
                <input type="hidden" name="id" value="<?php echo $category['Category_id']; ?>">
                <button type="submit" class="btn btn-danger">Да, удалить</button>
                <a href="add_category" class="btn btn-secondary">Нет, отменить</a>
            </form>
        <?php endif; ?>
    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
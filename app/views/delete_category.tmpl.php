<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Подтверждение удаления категории</h1>
        <p>Вы уверены, что хотите удалить эту категорию?</p>
        <form action="delete_category" method="post">
            <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
            <button type="submit" class="btn btn-danger">Да, удалить</button>
            <a href="add_category" class="btn btn-secondary">Нет, отменить</a>
        </form>
    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
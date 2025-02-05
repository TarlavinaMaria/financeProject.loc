<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Добавить категорию</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="category_name">Название категории:</label>
                <input type="text" id="category_name" name="category_name" required class="form-control">
            </div>
            <div class="form-group">
                <label for="type_category">Тип категории:</label>
                <select id="type_category" name="type_category" required class="form-control">
                    <option value="1">Доход</option>
                    <option value="0">Расход</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Добавить категорию</button>
        </form>

        <h3 class="mt-4">Список категорий:</h3>

        <div class="d-flex justify-content-between">
            <!-- Таблица для доходов -->
            <div class="me-3" style="flex: 1;">
                <h4>Доходы</h4>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Название категории</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($income_categories)) {
                            foreach ($income_categories as $category) {
                                echo "<tr>
                                        <td>{$category['CategoryName']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='1'>Категорий доходов нет</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Таблица для расходов -->
            <div style="flex: 1;">
                <h4>Расходы</h4>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Название категории</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($expense_categories)) {
                            foreach ($expense_categories as $category) {
                                echo "<tr>
                                        <td>{$category['CategoryName']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='1'>Категорий расходов нет</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
<?php require(COMPONENTS . "/header.php"); ?>

<main class="main py-3">
    <div class="container mt-4">
        <h1>Мой Кошелек</h1>
        <div class="budget-info">
            <h2>Текущий бюджет: 10000 ₽</h2>
        </div>

        <h3 class="mt-4">Действия с бюджетом:</h3>
        <div class="d-flex flex-column mt-3">
            <a href="add_income" class="btn btn-success mb-2">Добавить доход</a>
            <a href="add_expense" class="btn btn-danger mb-2">Добавить расход</a>
            <a href="add_category" class="btn btn-primary mb-2">Добавить категорию</a>
            <a href="budget_analysis" class="btn btn-info mb-2">Анализ бюджета</a>
        </div>

        <h3 class="mt-4">Последние действия:</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Категория</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                    <th>Комментарий</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($action)) {
                    foreach ($action as $row) {
                        echo "<tr>
                        <td>{$row['CategoryName']}</td>
                        <td>{$row['Sum']} ₽</td>
                        <td>{$row['Date']}</td>
                        <td>{$row['Comment']}</td>
                        
                      </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Действий нет</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
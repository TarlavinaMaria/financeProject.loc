<?php require(COMPONENTS . "/header.php"); ?>
<main class="main py-3">
    <div class="container mt-4">
        <h1 class="text-center">Мой Кошелек</h1>
        <div class="budget-info text-center">
            <h2>Текущий бюджет: 10000 ₽</h2>
            <!-- <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                    aria-valuemax="100">75%</div>
            </div> -->
        </div>

        <h3 class="mt-4 text-center">Действия с бюджетом:</h3>
        <div class="d-flex justify-content-around mt-3">
            <a href="add_income" class="btn btn-success">Добавить доход</a>
            <a href="add_expense" class="btn btn-danger">Добавить расход</a>
            <a href="budget_analysis" class="btn btn-info">Анализ бюджета</a>
        </div>

    </div>
</main>

<?php require(COMPONENTS . "/footer.php"); ?>
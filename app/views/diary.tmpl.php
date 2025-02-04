<!-- Внутренняя страница дневника -->

<?php require(COMPONENTS . "/header.php"); ?>
<main class="main py-3">
    <div class="container">
        <!-- Карточка для отслеживания дня -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-calendar-day fa-2x text-primary me-3"></i>
                    <h2 class="card-title mb-0">Мой дневник</h2>
                </div>
                <p class="card-text">
                    В этом разделе вы можете вести записи о своей жизни. Вот что можно делать:
                </p>
                <ul>
                    <li>Ежедневные события: Записывайте, что произошло в течение дня, важные встречи, интересные
                        моменты.</li>
                    <li>Чувства и эмоции: Делитесь своими мыслями и чувствами, описывайте, что вас радует, беспокоит или
                        вдохновляет.</li>
                    <li>Цели и мечты: Записывайте свои цели, мечты и планы на будущее. Это поможет вам лучше понять,
                        чего вы хотите достичь.</li>
                    <li>Заметки о здоровье: Ведите записи о своем самочувствии, физической активности и питании.</li>
                </ul>
            </div>
        </div>

        <!-- Карточка для учета доходов и расходов -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-coins fa-2x text-warning me-3"></i>
                    <h2 class="card-title mb-0">Кошелек</h2>
                </div>
                <p class="card-text">
                    Контролируйте свои финансы. Вот что можно делать:
                </p>
                <ul>
                    <li>Записывать все доходы и расходы за день.</li>
                    <li>Категоризировать траты (еда, транспорт, развлечения и т.д.).</li>
                    <li>Анализировать, на что уходит больше всего денег.</li>
                    <li>Анализировать, траты за месяц или год.</li>
                </ul>
            </div>
        </div>

        <!-- Карточка для заметок -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-sticky-note fa-2x text-info me-3"></i>
                    <h2 class="card-title mb-0">Заметки и идеи</h2>
                </div>
                <p class="card-text">
                    Записывайте свои мысли, идеи и планы. Вот что можно делать:
                </p>
                <ul>
                    <li>Фиксировать внезапные идеи или вдохновение.</li>
                    <li>Составлять списки дел или планы на будущее.</li>
                    <li>Записывать цитаты или мысли, которые вас вдохновляют.</li>
                    <li>Вести список книг, фильмов или мест, которые хотите посетить.</li>
                </ul>
            </div>
        </div>
    </div>
</main>
<?php require(COMPONENTS . "/footer.php"); ?>
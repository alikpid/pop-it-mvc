<div class="sections">
    <h2>Подразделения</h2>
    <div>
        <?php
        foreach ($subdivisions as $subdivision) {
            ?>
        <div class="section">
            <div class="img-sec"></div>
            <p><a href="#"><?= $subdivision->title ?></a></p>
        </div>
        <?php
        }
        ?>
    </div>

    <h2>Составы</h2>
    <div>
        <?php
        foreach ($positionTypes as $positionType) {
            ?>
            <div class="section">
                <div class="img-sec"></div>
                <p><a href="#"><?= $positionType->title ?></a></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<div class="employee">
    <div class="emp-head">
        <h2>Сотрудники</h2>
        <input type="search" placeholder="Поиск">
    </div>
    <p>Средний возраст - 200 лет</p>
    <ul>
        <?php
        foreach ($employees as $employee) {
            echo '<li><a href="#">' . $employee->surname . '<br>' . $employee->name . ' ' . $employee->middlename . '</li></a>';
        }
        ?>
    </ul>
    <button type="button">Добавить</button>
</div>
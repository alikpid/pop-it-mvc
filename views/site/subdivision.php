<?php
//foreach ($subdivision as $sub) {
//    echo '<li>' . $sub->title . '</li>';
//}
//?>

<div class="container">
    <div class="employee row justify-content-center">
        <div class="col-md-9">
            <div class="emp-head d-flex justify-content-between align-items-center">
                <h2>Сотрудники</h2>
                <input type="search" placeholder="Поиск" class="form-control w-25">
            </div>
<!--            <p>Средний возраст: --><?//= $avgAge . $message ?><!-- </p>-->
            <ul class="list-unstyled">
                <?php
                foreach ($employees as $employee) {
                    ?>
                    <li><a href="<?= app()->route->getUrl('/employee?id=' . $employee->id) ?>" class="text-dark">
                            <?= $employee->surname ?><br>
                            <?= $employee->name ?>
                            <?= $employee->middlename ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <button type="button" class="btn btn-primary"><a href="<?= app()->route->getUrl('/add-employee') ?>">Добавить</a>
            </button>
        </div>
    </div>
</div>


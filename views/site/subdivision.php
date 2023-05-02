<div class="subdivision container">
    <div class="subdivision row justify-content-center">
        <div class="col-md-9">
            <h2><?= $subdivision['title']; ?> подразделение</h2>
            <div class="emp-head d-flex justify-content-between">
                <h3 class="">Сотрудники</h3>
                <input type="search" placeholder="Поиск" class="form-control w-25">
            </div>
            <!--            <p>Средний возраст: --><? //= $avgAge . $message ?><!-- </p>-->
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
        </div>
    </div>
</div>


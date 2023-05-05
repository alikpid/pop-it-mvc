<div class="subdivision container">
    <div class="subdivision row justify-content-center">
        <div class="col-md-9">
            <h2><?= $subdivision['title']; ?> подразделение</h2>
            <div class="emp-head d-flex justify-content-between">
                <h3 class="">Сотрудники</h3>
                <form method="post">
                    <input type="text" name="search" placeholder="Поиск" class="form-control">
                </form>
            </div>
            <ul class="list-unstyled">
                <?php
                foreach ($employees as $employee) {
                if (!$employee->firedEmployee) {
                    ?>
                    <li><a href="<?= app()->route->getUrl('/employee?id=' . $employee->id) ?>" class="text-dark">
                            <?= $employee->surname ?><br>
                            <?= $employee->name ?>
                            <?= $employee->middlename ?>
                        </a>
                    </li>
                    <?php
                }
                }
                ?>
            </ul>
        </div>
    </div>
</div>


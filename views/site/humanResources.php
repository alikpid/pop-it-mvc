<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h2>Подразделения</h2>
            <div class="d-flex flex-wrap">
                <?php
                foreach ($subdivisions as $subdivision) {
                    ?>
                    <div class="section">
                        <div class="img-sec"></div>
                        <p><a href="<?= app()->route->getUrl('/subdivision?id=' . $subdivision->id) ?>"
                              class="text-dark"><?= $subdivision->title ?></a></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Составы</h2>
            <div class="d-flex flex-wrap">
                <?php
                foreach ($positionTypes as $positionType) {
                    ?>
                    <div class="section">
                        <div class="img-sec mr-3"></div>
                        <p><a href="<?= app()->route->getUrl('/staff?id=' . $positionType->id) ?>"
                              class="text-dark"><?= $positionType->title ?></a></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="employee row justify-content-center">
        <div class="col-md-9">
            <div class="emp-head d-flex justify-content-between align-items-center">
                <h2>Сотрудники</h2>
                <form method="post">
                    <input type="text" name="search" placeholder="Поиск" class="form-control">
                </form>
            </div>
            <p>Средний возраст: <?= $avgAge . $message ?> </p>
            <ul class="list-unstyled">
                <?php
                foreach ($employees as $employee) { ?>
                    <li><a href="<?= app()->route->getUrl('/employee?id=' . $employee->id) ?>" class="text-dark">
                            <?= $employee->surname ?><br>
                            <?= $employee->name ?>
                            <?= $employee->middlename ?>
                        </a>
                    </li>
                    <?php } ?>
            </ul>
            <?php
            if (app()->auth::user()->hasRole('admin')):
            ?>
            <button type="button" class="btn btn-primary"><a href="<?= app()->route->getUrl('/add-employee') ?>">Добавить</a>
            </button>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>


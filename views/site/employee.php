<div class="emp-card container">
    <div class="emp-card row justify-content-center">
        <div class="emp-card col-md-9">
            <div class="emp-head d-flex">
                <?php
                if ($employee->image) { ?>
                    <div class="img"><img class="img-emp" src="<?= $employee->image ?>" alt="emp-img"/></div>
                <?php }
                else { ?>
                    <div class="none-img-emp"></div>
                <?php } ?>
                <div class="d-flex flex-column">
                    <h2 class="text-dark"><?= $employee->surname ?></h2>
                    <h3><?= $employee->name . ' ' . $employee->middlename ?></h3> <br>
                    <h2 class="emp-pos text-dark">Должность:</h2>
                    <h4><?= $position->title ?></h4>
                </div>
            </div>
            <p>Подразделение:<br> <?= $subdivision->title ?></p>
            <p>Пол:<br> <?= $employee->sex ?></p>
            <p>Дата рождения:<br> <?= $employee->DOB ?></p>
            <p>Адрес прописки:<br> <?= $employee->placeOfResidence ?></p>

            <?php
            if (app()->auth::user()->hasRole('admin')):
                ?>
                <div class="emp-buttons d-flex align-items-center">
                    <button type="button" class="btn btn-primary"><a href="<?= app()->route->getUrl('/update-employee?id=' . $employee->id) ?>">Изменить</a></button>
                    <button type="button" class="btn btn-primary"><a href="<?= app()->route->getUrl('/fire-employee?id=' . $employee->id) ?>">Уволить</a></button>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
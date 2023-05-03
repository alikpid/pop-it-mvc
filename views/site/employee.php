<div class="emp-card container">
    <div class="emp-card row justify-content-center">
        <div class="emp-card col-md-9">
            <div class="emp-head d-flex">
                <div class="img-emp"></div>
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

            <div class="emp-buttons d-flex">
                <button type="button" class="btn btn-primary"><a href="<?= app()->route->getUrl('/fire-employee?id=' . $employee->id) ?>">Уволить</a></button>
            </div>

            <form method="post" class="addEmp" action="<?= app()->route->getUrl('/update-employee?id=' . $employee->id); ?>">
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?=$employee->surname;?>">
                </div>

                <div class="checkselect">
                    <label for="subId">Подразделение</label>
                    <select class="form-select" id="subId" name="id_subdivision">
                        <?php
                        foreach ($subdivisions as $subdivision) {
                            ?> <option value="<?=$subdivision->id;?>" <?=($employee->id_subdivision == $subdivision->id ? 'selected' : '')?>><?=$subdivision->title;?></option> <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="checkselect">
                    <label for="posId">Должность</label>
                    <select class="form-select" id="posId" name="id_position">
                        <?php
                        foreach ($positions as $position) {
                            ?> <option value="<?=$position->id;?>" <?=($employee->id_position == $position->id ? 'selected' : '')?>><?=$position->title;?></option> <?php
                        }
                        ?>
                    </select>
                </div>
                <button>Изменить</button>
            </form>
        </div>
    </div>
</div>

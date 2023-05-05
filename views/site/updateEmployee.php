<div class="addFiredEmp container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <?php
            if ($message) { ?>
                <div class="alert alert-danger"><?= $message ?></div>
                <?php
            }
            ?>
            <form method="post" class="addEmp">
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
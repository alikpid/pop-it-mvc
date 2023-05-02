<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" >
            <h2>Добавление сотрудника</h2>
            <form method="post" class="addEmp">

                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="middlename">Отчество</label>
                    <input type="text" class="form-control" id="middlename" name="middlename">
                </div>

                <div class="form-group">
                    <p>Пол</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="Мужской" checked>
                        <label class="form-check-label" for="male">Мужской</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="Женский">
                        <label class="form-check-label" for="female">Женский</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthday">Дата рождения</label>
                    <input type="date" class="form-control" id="birthday" name="DOB">
                </div>

                <div class="form-group">
                    <label for="placeOfResidence">Адрес прописки</label>
                    <input type="text" class="form-control" id="placeOfResidence" name="placeOfResidence">
                </div>

                <div class="checkselect">
                    <label for="subId">Подразделение</label>
                    <select class="form-select" id="subId" name="id_subdivision">
                        <?php
                        foreach ($subdivisions as $subdivision) {
                            ?> <option value=<?=$subdivision->id;?>><?=$subdivision->title;?></option> <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="checkselect">
                    <label for="posId">Должность</label>
                    <select class="form-select" id="posId" name="id_position">
                        <?php
                        foreach ($positions as $position) {
                            ?> <option value=<?=$position->id;?>><?=$position->title;?></option> <?php
                        }
                        ?>
                    </select>
                </div>

                <button>Добавить</button>
            </form>
        </div>
    </div>
</div>

<div class="subdivision container">
    <div class="subdivision row justify-content-center">
        <div class="col-md-9">
            <div class="emp-head d-flex justify-content-between">
                <h3>Уволенные сотрудники</h3>
                <form method="post">
                    <input type="text" name="search" placeholder="Поиск" class="form-control">
                </form>
            </div>
            <ul class="list-unstyled">
                <?php
                foreach ($employees as $employee) {
                    if ($employee->firedEmployee) {
                    ?>
                    <li><?= $employee->surname ?>
                        <?= $employee->name ?>
                        <?= $employee->middlename ?> <br>
                        Причина:
                        <?= $employee->firedEmployee->reason ?> <br>
                        Дата ухода:
                        <?= $employee->firedEmployee->quiteDate ?>
                    </li>
                    <?php
                }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

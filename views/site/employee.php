<div class="emp-card container">
    <div class="subdivision row justify-content-center">
        <div class="col-md-9">
            <div class="emp-head d-flex">
                <?php
                foreach ($employees as $employee) {
                ?>
                <div class="img-emp"></div>
                <div class="d-flex flex-column">
                    <h2 class="text-dark"><?= $employee->surname ?></h2>
                    <h3><?= $employee->name . ' ' . $employee->middlename ?></h3>
                    <h2 class="emp-pos text-dark">Должность:</h2>
                    <h3><?= $position['title'] ?></h3>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

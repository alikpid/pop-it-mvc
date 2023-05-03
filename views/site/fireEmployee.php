<div class="addFiredEmp container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h2>Уволить сотрудника: <?= $employee->surname; ?></h2>
            <form method="post" class="addEmp">
                <input type="hidden" name="id_employee" value="<?= $employee->id; ?>">
                <div class="form-group">
                    <label for="reason">Причина</label>
                    <input type="text" class="form-control" id="reason" name="reason">
                </div>

                <div class="form-group">
                    <label for="quiteDate">Дата ухода</label>
                    <input type="date" class="form-control" id="quiteDate" name="quiteDate">
                </div>

                <button>Уволить</button>

        </div>
    </div>
</div>

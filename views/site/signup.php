<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9"><h2>Регистрация</h2>
            <h3><?= $message ?? ''; ?></h3>
            <form method="post" class="reg">
                <input type="text" name="name" placeholder="Имя">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
                <div class="checkselect">
                    <label for="subId">Роль</label>
                    <select class="form-select" id="subId" name="id_role">
                        <?php
                        foreach ($roles as $role) {
                            ?> <option value=<?=$role->id;?>><?=$role->title;?></option> <?php
                        }
                        ?>
                    </select>
                </div>
                <button>Зарегистрироваться</button>
            </form>
        </div>
    </div>
</div>

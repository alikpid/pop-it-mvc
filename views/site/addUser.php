<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h2>Добавление пользователя</h2>
            <h3><?= $message ?? ''; ?></h3>
            <form method="post" class="reg">
                <input type="text" name="name" placeholder="Имя">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
                <div class="checkselect">
                    <label for="role">Роль</label>
                    <select class="form-select" id="role" name="role">
                        <?php
                        foreach ($users as $user) {
                            ?> <option value=<?=$user->role;?>><?=$user->role;?></option> <?php
                        }
                        ?>
                    </select>
                </div>
                <button>Добавить</button>
            </form>
        </div>
    </div>
</div>


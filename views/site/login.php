<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h2>Авторизация</h2>
            <h3><?= $message ?? ''; ?></h3>

            <h3><?= app()->auth->user()->name ?? ''; ?></h3>
            <?php
            if (!app()->auth::check()):
            ?>
            <form method="post" class="auth">
                <input id="login" type="text" name="login" placeholder="Логин">
                <input id="password" type="password" name="password" placeholder="Пароль">
                <button id="enter">Войти</button>
            </form>
        </div>
    </div>
</div>
<?php endif;

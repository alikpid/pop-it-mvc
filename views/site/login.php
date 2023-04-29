<h2>Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post">
        <input id="login" type="text" name="login" placeholder="Логин">
        <input id="password" type="password" name="password" placeholder="Пароль">
        <button id="enter">Войти</button>
    </form>
<?php endif;

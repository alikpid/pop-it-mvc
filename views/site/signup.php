<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9"><h2>Регистрация</h2>
            <h3><?= $message ?? ''; ?></h3>
            <form method="post" class="reg">
                <input type="text" name="name" placeholder="Имя">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль">
                <button>Зарегистрироваться</button>
            </form>
        </div>
    </div>
</div>

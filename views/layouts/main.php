<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link type="text/css" rel="stylesheet" href="/pop-it-mvc/public/style/style.css">-->
<!--    <title>Pop it MVC</title>-->
<!--</head>-->
<!--<body>-->
<!--<header>-->
<!--    <a class="logo" href="#">Отдел кадров</a>-->
<!--</header>-->
<!---->
<!--<main>-->
<!--    <div class="sections">-->
<!--        <h2>Подразделения</h2>-->
<!--        <div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Учебное</p>-->
<!--            </div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Хозяйственное</p>-->
<!--            </div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Информационное</p>-->
<!--            </div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Финансовое</p>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <h2>Составы</h2>-->
<!--        <div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Преподавательский</p>-->
<!--            </div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Администрация</p>-->
<!--            </div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Учебно-<br>вспомогательный</p>-->
<!--            </div>-->
<!--            <div class="section">-->
<!--                <div class="img-sec"></div>-->
<!--                <p>Техническое<br>обслуживание</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="employee">-->
<!--        <div class="emp-head">-->
<!--            <h2>Сотрудники</h2>-->
<!--            <input type="search" placeholder="Поиск">-->
<!--        </div>-->
<!--        <p>Средний возраст - 200 лет</p>-->
<!--        <ul>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            <li><a href="#">Путин<br>Валерий Александрович</a></li>-->
<!--            --><?php
//            foreach ($employees as $employee) {
//                echo '<li>' . $employee->surname . '</li>';
//            }
//            ?>
<!--        </ul>-->
<!--        <button type="button">Добавить</button>-->
<!--    </div>-->
<!--</main>-->
<!---->
<!--</body>-->
<!--</html>-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="/pop-it-mvc/public/style/style.css">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav>
        <a class="logo" href="<?= app()->route->getUrl('/go/') ?>">Отдел кадров</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php
        else:
            ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
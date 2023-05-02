<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="/pop-it-mvc/public/style/styles.css">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-9 d-flex flex-wrap align-items-center">
                    <a class="logo" href="<?= app()->route->getUrl('/go') ?>">Отдел кадров</a>
                    <?php
                    if (!app()->auth::check()):
                        ?>
                        <a class="auth-but" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
                        <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
                    <?php
                    else:
                        ?>
                        <a class="auth-but" href="<?= app()->route->getUrl('/hello') ?>">Профиль</a>
                        <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>

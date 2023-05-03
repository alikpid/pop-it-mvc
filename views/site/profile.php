<div class="container">
    <div class="row justify-content-center">
        <div class="profile col-md-9 d-flex flex-column">
            <h2>Профиль: <?= app()->auth::user()->name; ?></h2>
            <?php
            if (app()->auth::user()->hasRole('admin')):
                ?>
                <a class="link-primary" href="<?= app()->route->getUrl('/add-user') ?>">Добавить пользователя</a>
            <?php
            endif;
            ?>
            <a class="link-primary" href="<?= app()->route->getUrl('/fired-employees') ?>">Уволенные сотрудники</a>
        </div>
    </div>
</div>
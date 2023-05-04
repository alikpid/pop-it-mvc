<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity'=>\Model\User::class,
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class
    ],
    //Классы для middleware
    'routeAppMiddleware' => [
    ],
    'routeMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
        'auth' => \Middlewares\AuthMiddleware::class,
        'role' => \Middlewares\RoleMiddleware::class,
    ],

];

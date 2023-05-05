<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity'=>\Model\User::class,
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'login' => \Validators\LoginValidator::class,
        'date' => \Validators\DateValidator::class,
        'rus' => \Validators\NameValidator::class,
        'img' => \Validators\ImageValidator::class,
        'address' => \Validators\AddressValidator::class,
    ],
    //Классы для middleware
    'routeAppMiddleware' => [
    ],
    'routeMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'role' => \Middlewares\RoleMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'auth' => \Middlewares\AuthMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],

];

<?php

use Src\Route;

    Route::add('GET', '/human-resources', [Controller\Site::class, 'index'])
        ->middleware('auth');
    Route::add('GET', '/profile', [Controller\Site::class, 'profile'])
    ->middleware('auth');
    Route::add(['GET', 'POST'], '/add-employee', [Controller\Site::class, 'addEmployee'])->middleware('role:admin');
    Route::add(['GET', 'POST'], '/add-user', [Controller\Site::class, 'addUser'])->middleware('role:admin', 'trim', 'specialChars', 'csrf');
    Route::add(['GET', 'POST'], '/update-employee', [Controller\Site::class, 'updateEmployee']);
    Route::add(['GET', 'POST'], '/fire-employee', [Controller\Site::class, 'fireEmployee'])->middleware('role:admin');
    Route::add(['GET'], '/fired-employees', [Controller\Site::class, 'firedEmployeesList']);
    Route::add(['GET'], '/subdivision', [Controller\Site::class, 'subdivision']);
    Route::add(['GET'], '/staff', [Controller\Site::class, 'staff']);
    Route::add(['GET'], '/employee', [Controller\Site::class, 'employee']);
    Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
    Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login', 'csrf']);
    Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

//Route::group('/go', function () {
//    Route::add('GET', '/', [Controller\Site::class, 'index']);
//    Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
//    Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
//    Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
//});
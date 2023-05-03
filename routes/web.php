<?php

use Src\Route;

    Route::add('GET', '/go', [Controller\Site::class, 'index'])
        ->middleware('auth');
    Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
    Route::add(['GET', 'POST'], '/add-employee', [Controller\Site::class, 'addEmployee']);
    Route::add(['GET', 'POST'], '/update-employee', [Controller\Site::class, 'updateEmployee']);
    Route::add(['GET', 'POST'], '/fire-employee', [Controller\Site::class, 'fireEmployee']);
    Route::add(['GET'], '/fired-employees', [Controller\Site::class, 'firedEmployeesList']);
    Route::add(['GET'], '/subdivision', [Controller\Site::class, 'subdivision']);
    Route::add(['GET'], '/staff', [Controller\Site::class, 'staff']);
    Route::add(['GET'], '/employee', [Controller\Site::class, 'employee']);
    Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
    Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
    Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

//Route::group('/go', function () {
//    Route::add('GET', '/', [Controller\Site::class, 'index']);
//    Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
//    Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
//    Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
//});
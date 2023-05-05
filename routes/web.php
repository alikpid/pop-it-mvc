<?php

use Src\Route;
//Route::group('/human-resources', function () {
    Route::add(['GET', 'POST'], '/add-user', [Controller\UserController::class, 'addUser'])->middleware( 'role:admin', 'trim', 'specialChars', 'csrf');
    Route::add(['GET', 'POST'], '/', [Controller\Site::class, 'index'])
        ->middleware('auth');
    Route::add('GET', '/profile', [Controller\UserController::class, 'profile'])->middleware('auth');
    Route::add(['GET', 'POST'], '/add-employee', [Controller\EmployeeController::class, 'addEmployee'])->middleware('role:admin');
    Route::add(['GET', 'POST'], '/update-employee', [Controller\EmployeeController::class, 'updateEmployee']);
    Route::add(['GET', 'POST'], '/fire-employee', [Controller\EmployeeController::class, 'fireEmployee'])->middleware('role:admin');
    Route::add(['GET', 'POST'], '/fired-employees', [Controller\Site::class, 'firedEmployeesList']);
    Route::add(['GET', 'POST'], '/subdivision', [Controller\Site::class, 'subdivision']);
    Route::add(['GET', 'POST'], '/staff', [Controller\Site::class, 'staff']);
    Route::add(['GET'], '/employee', [Controller\EmployeeController::class, 'employee']);
    Route::add(['GET', 'POST'], '/signup', [Controller\UserController::class, 'signup']);
    Route::add(['GET', 'POST'], '/login', [Controller\UserController::class, 'login', 'csrf']);
    Route::add('GET', '/logout', [Controller\UserController::class, 'logout']);
//});
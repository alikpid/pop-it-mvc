<?php

namespace Controller;

use Model\UserRole;
use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Model\User;
use Src\Auth\Auth;


class UserController
{
    public function profile()
    {
        return (new View)->render('site.profile');
    }

    public function signup(Request $request): string
    {
        $roles = UserRole::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/profile');
        }
        return new View('site.signup', ['roles' => $roles]);
    }

    public function addUser(Request $request): string
    {
        $usRoles = UserRole::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login', 'login'],
                'password' => ['required'],
            ],[
                'required' => 'Поле :field обязательно',
                'unique' => 'Поле :field должно быть уникально',
                'login' => 'Поле :field может содержать только латиницу и цифры'
            ],
            );
            if($validator->fails()){
                return new View('site.addUser',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'usRoles' => $usRoles]);
            }
            if (User::create($request->all())) {
                app()->route->redirect('/profile');
            }
        }
        return new View('site.addUser', ['usRoles' => $usRoles]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/profile');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/profile');
    }
}
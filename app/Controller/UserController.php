<?php

namespace Controller;

use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Model\User;
use Src\Auth\Auth;


class UserController
{
    public function profile(): string
    {
        return new View('site.profile');
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && \Model\User::create($request->all())) {
            app()->route->redirect('/profile');
        }
        return new View('site.signup');
    }

    public function addUser(Request $request): string
    {
        $users = User::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login', 'login'],
                'password' => ['required']
            ]);
            if($validator->fails()){
                return new View('site.addUser',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users]);
            }
            if (User::create($request->all())) {
                app()->route->redirect('/profile');
            }
        }
        return new View('site.addUser', ['users' => $users]);
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
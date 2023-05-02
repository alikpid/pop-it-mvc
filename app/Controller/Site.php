<?php

namespace Controller;

use Model\Employee;
use Model\PositionType;
use Model\Position;
use Model\Subdivision;
use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class Site
{
    public function index(Request $request): string
    {
        $employees = Employee::all();
        $subdivisions = Subdivision::all();
        $positionTypes = PositionType::all();
        $avgAge = Employee::selectRaw('ROUND(AVG(TIMESTAMPDIFF(YEAR, DOB, NOW()))) as average_age')
            ->get()[0]->average_age;
        $message = $this->checkAverageAge($avgAge);

        return (new View())->render('site.post', ['employees' => $employees,
                                                       'subdivisions' => $subdivisions,
                                                       'positionTypes' => $positionTypes,
                                                       'avgAge' => $avgAge,
                                                       'message' => $message]);
    }

    private function checkAverageAge($averageAge)
    {
        $lastDigit = substr($averageAge, -1);

        if ($lastDigit >= 2 && $lastDigit <= 4) {
            return " года";
        }
        if ($lastDigit == 0 || $lastDigit == 5) {
            return " лет";
        }
        else
        {
            return " год";
        }
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'Профиль: ' . app()->auth::user()->name]);
    }

    public function subdivision(Request $request)
    {
        $employees = Employee::all();
        $subdivision = Subdivision::where('id', $request->id)->get();
        return (new View())->render('site.subdivision', ['subdivision' => $subdivision, 'employees' => $employees]);
    }

    public function staff(Request $request)
    {
        $staffs = PositionType::where('id', $request->id)->get();
        return (new View())->render('site.staff', ['staffs' => $staffs]);
    }

    public function employee(Request $request)
    {
        $employees = Employee::where('id', $request->id)->get();
        return (new View())->render('site.employee', ['employees' => $employees]);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.signup');
    }

    public function addEmployee(Request $request): string
    {
        $subdivisions = Subdivision::all();
        $positions = Position::all();
        if ($request->method === 'POST' && Employee::create($request->all())) {
            app()->route->redirect('/go/');
        }
        return new View('site.addEmployee', ['subdivisions' => $subdivisions,
                                                  'positions' => $positions]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

}



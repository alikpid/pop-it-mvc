<?php

namespace Controller;

use Model\Employee;
use Model\PositionType;
use Model\Position;
use Model\Subdivision;
use Model\FiredEmployee;
use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class Site
{
    public function index(Request $request): string
    {
//        $employees = Employee::leftJoin('fired_employees', 'employees.id', '=', 'fired_employees.id_employee')
//            ->whereNull('fired_employees.id_employee') я это напамять оставлю. офигенный запрос
//            ->get();
        $employees = Employee::with('firedEmployee')->get();
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
        if ($lastDigit == 0 || ($lastDigit <= 9 && $lastDigit >= 5)) {
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
//        $employees = Employee::where('id_subdivision', $request->id)->get();
        $employees = Employee::leftJoin('fired_employees', 'employees.id', '=', 'fired_employees.id_employee')
            ->whereNull('fired_employees.id_employee')
            ->where('id_subdivision', $request->id)
            ->get();
        $subdivision = Subdivision::where('id', $request->id)->first();
        return (new View())->render('site.subdivision', ['subdivision' => $subdivision, 'employees' => $employees]);
    }

    public function staff(Request $request)
    {
//        $employees = Employee::where('id_position', $request->id)->get();
        $staffs = PositionType::where('id', $request->id)->first();
        $employees = Employee::leftJoin('fired_employees', 'employees.id', '=', 'fired_employees.id_employee')
            ->whereNull('fired_employees.id_employee')
            ->whereHas('position', function ($query) use ($request) {
                $query->where('id_type', $request->id);
            })
            ->get();
        return (new View())->render('site.staff', ['staffs' => $staffs, 'employees' => $employees]);
    }

    public function employee(Request $request)
    {
        $positions = Position::all();
        $subdivisions = Subdivision::all();
        $employee = Employee::where('id', $request->id)->first();
        $position = $employee->position()->first();
        $subdivision = $employee->subdivision()->first();
        return (new View())->render('site.employee', ['employee' => $employee,
                                                           'position' => $position,
                                                           'subdivision' => $subdivision,
                                                           'positions' => $positions,
                                                           'subdivisions' => $subdivisions]);
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
            app()->route->redirect('/go');
        }
        return new View('site.addEmployee', ['subdivisions' => $subdivisions,
                                                  'positions' => $positions]);
    }

    public function updateEmployee(Request $request)
    {
        $employee = Employee::where('id', $request->id)->first();
        if($request->method === 'POST') {
            $updateDetails = [
                'id_subdivision' => $request->get('id_subdivision'),
                'id_position' => $request->get('id_position'),
                'surname' => $request->get('surname')
            ];
            $employee->update($updateDetails);
        }
        return app()->route->redirect('/employee?id=' . $employee->id);
    }

    public function fireEmployee(Request $request): string
    {
        $employee = Employee::where('id', $request->id)->first();
        if ($request->method === 'POST' && FiredEmployee::create($request->all())) {
            app()->route->redirect('/fired-employees');
        }
        return new View('site.fireEmployee', ['employee' => $employee]);
    }

    public function firedEmployeesList(Request $request): string
    {
        $employees = Employee::with('firedEmployee')->get();
        return new View('site.firedEmployees', ['employees' => $employees]);
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



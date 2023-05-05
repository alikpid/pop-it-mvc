<?php

namespace Controller;

use Model\Employee;
use Model\PositionType;
use Model\Subdivision;
use Src\View;
use Src\Request;

class Site
{
    public function index(Request $request): string
    {
        $employees = Employee::with('firedEmployee')->get();
        if ($request->method === 'POST') {
            $employees = Employee::search($request->search);
        }
        $subdivisions = Subdivision::all();
        $positionTypes = PositionType::all();
        $avgAge = Employee::selectRaw('ROUND(AVG(TIMESTAMPDIFF(YEAR, DOB, NOW()))) as average_age')
            ->get()[0]->average_age;
        $message = $this->checkAverageAge($avgAge);

        return (new View())->render('site.humanResources', ['employees' => $employees,
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

    public function subdivision(Request $request)
    {
        $employees = Employee::with('firedEmployee')->where('id_subdivision', $request->id)->get();
        if ($request->method === 'POST') {
            $employees = Employee::search($request->search);
        }
        $subdivision = Subdivision::where('id', $request->id)->first();
        return (new View())->render('site.subdivision', ['subdivision' => $subdivision, 'employees' => $employees]);
    }

    public function staff(Request $request)
    {
        $staffs = PositionType::where('id', $request->id)->first();
        $employees = Employee::leftJoin('fired_employees', 'employees.id', '=', 'fired_employees.id_employee')
            ->whereNull('fired_employees.id_employee')
            ->whereHas('position', function ($query) use ($request) {
                $query->where('id_type', $request->id);
            })
            ->get();
        if ($request->method === 'POST') {
            $employees = Employee::search($request->search);
        }
        return (new View())->render('site.staff', ['staffs' => $staffs, 'employees' => $employees]);
    }

    public function firedEmployeesList(Request $request): string
    {
        $employees = Employee::with('firedEmployee')->get();
        if ($request->method === 'POST') {
            $employees = Employee::search($request->search);
        }
        return new View('site.firedEmployees', ['employees' => $employees]);
    }

}



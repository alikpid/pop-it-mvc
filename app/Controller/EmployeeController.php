<?php

namespace Controller;

use Model\Employee;
use Model\FiredEmployee;
use Model\Position;
use Model\Subdivision;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class EmployeeController
{
    public function employee(Request $request)
    {
//        $message = null;
//        $positions = Position::all();
//        $subdivisions = Subdivision::all();
        $employee = Employee::where('id', $request->id)->first();
        $position = $employee->position()->first();
        $subdivision = $employee->subdivision()->first();
        return (new View())->render('site.employee', ['employee' => $employee,
            'position' => $position,
            'subdivision' => $subdivision]);
    }

    public function addEmployee(Request $request)
    {
        $subdivisions = Subdivision::all();
        $positions = Position::all();
        $message = null;
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'DOB' => ['date', 'required'],
                'image' => ['img'],
                'name' => ['rus', 'required'],
                'surname' => ['rus', 'required'],
                'middlename' => ['rus', 'required'],
                'placeOfResidence' => ['address', 'required']
            ], [
                'date' => 'Неверный формат даты',
                'img' => 'Поле :field обязательно',
                'rus' => 'Поле :field может содержать только кириллицу',
                'address' => 'Поле :field может содержать только кириллицу и цифры',
                'required' => 'Поле :field обязательно'
            ]);
            if($validator->fails()){
                $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
            }
            $path = '../public/images/';
            $storage = new \Upload\Storage\FileSystem($path);
            $file = new \Upload\File('image', $storage);
            $new_filename = uniqid();
            $file->setName($new_filename);
            $file_name = $file->getNameWithExtension($new_filename);
            try {
                $file->upload();
            } catch (\Exception $e) {
                $errors = $file->getErrors();
            }
            if (!$message && Employee::create([
                    'surname' => $request->surname,
                    'name' => $request->name,
                    'middlename' => $request->middlename,
                    'sex' => $request->sex,
                    'DOB' => $request->DOB,
                    'placeOfResidence' => $request->placeOfResidence,
                    'id_subdivision' => $request->id_subdivision,
                    'id_position' => $request->id_position,
                    'image' => app()->route->getUrl('/') . 'images/' . $file_name
                ])) {
                app()->route->redirect('/');
                return false;
            }

        }
        return (new View)->render('site.addEmployee', ['subdivisions' => $subdivisions,
            'positions' => $positions,
            'message' => $message]);
    }

    public function updateEmployee(Request $request)
    {
        $positions = Position::all();
        $subdivisions = Subdivision::all();
        $employee = Employee::where('id', $request->id)->first();
        $message = null;
        if($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'surname' => ['rus'],
            ], [
                'rus' => 'Поле :field может содержать только кириллицу'
            ]);
            if($validator->fails()){
                $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
            }
            $updateDetails = [
                'id_subdivision' => $request->get('id_subdivision'),
                'id_position' => $request->get('id_position'),
                'surname' => $request->get('surname')
            ];
            if (!$message) {
                $employee->update($updateDetails);
                app()->route->redirect('/employee?id=' . $employee->id);
            }
        }
        return (new View)->render('site.updateEmployee', ['subdivisions' => $subdivisions,
            'employee' =>$employee,
            'positions' => $positions,
            'message' => $message]);
    }

    public function fireEmployee(Request $request): string
    {
        $employee = Employee::where('id', $request->id)->first();
        if ($request->method === 'POST' && FiredEmployee::create($request->all())) {
            app()->route->redirect('/fired-employees');
        }
        return new View('site.fireEmployee', ['employee' => $employee]);
    }
}
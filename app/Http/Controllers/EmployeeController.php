<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function index(){
        return view('admin.employee.home');
    }

    public function create(){
        return view('admin.employee.create');
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'data_nascimento' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);
        $data = Employee::create($validation);
        if ($data) {
            session()->flash('success', 'Funcionário Adicionado com Sucesso');
            return redirect(route('adminEmployees.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('admin.Employees/create'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Rules\CPF;
use App\Models\Employee;
use App\Rules\telefone;
use Illuminate\Http\Request;


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
            'cpf' => ['required', new CPF],
            'telefone' => ['required', new telefone],
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

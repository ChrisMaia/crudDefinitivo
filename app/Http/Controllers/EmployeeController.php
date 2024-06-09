<?php

namespace App\Http\Controllers;

use App\Rules\CPF;
use App\Models\Employee;
use App\Rules\telefone;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::orderBy('id', 'desc')->get();
        $total = Employee::count();
        return view('admin.employee.home', compact(['employees', 'total']));
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
            return redirect(route('adminEmployees.create'));
        }
        
    }

    public function edit($id){
        $employees = Employee::findOrFail($id);
        return view('admin.employee.update', compact('employees'));
    }

    public function destroy($id)
    {
        $employees = Employee::findOrFail($id)->delete();
        if ($employees) {
            session()->flash('success', 'Funcionário Deletado com Sucesso');
            return redirect(route('adminEmployees.index'));
        } else {
            session()->flash('error', 'Funcionário Não foi Deletado com Sucesso');
            return redirect(route('adminEmployees.index'));
        }
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'data_nascimento' => 'required',
            'cpf' => ['required', new CPF],
            'telefone' => ['required', new telefone],
            'email' => 'required',
        ]);
        
        $employees = Employee::findOrFail($id);
        $name = $request->name;
        $data_nascimento = $request->data_nascimento;
        $cpf = $request->cpf;
        $telefone = $request->telefone;
        $email = $request->email;

        $employees->name = $name;
        $employees->data_nascimento = $data_nascimento;
        $employees->cpf = $cpf;
        $employees->telefone = $telefone;
        $employees->email = $email;

        $data = $employees->save();
        if ($data) {
            session()->flash('success', 'Funcionário Atualizado com Sucesso');
            return redirect(route('adminEmployees.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminEmployees.update'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        $total = Category::count();
        return view('admin.category.home', compact(['categories', 'total']));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = Category::create($validation);
        if ($data) {
            session()->flash('success', 'Categoria Adicionada com Sucesso');
            return redirect(route('adminCategories.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminCategories.create'));
        }
    }
}

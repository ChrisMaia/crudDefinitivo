<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        $total = Category::count();
        $categories = Category::withCount('products')->get();
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

    public function edit($id){
        $categories = Category::findOrFail($id);
        return view('admin.category.update', compact('categories'));
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id)->delete();
        if ($categories) {
            session()->flash('success', 'Categoria Deletada com Sucesso');
            return redirect(route('adminCategories.index'));
        } else {
            session()->flash('error', 'Categoria Não Deletada com Sucesso');
            return redirect(route('adminCategories.index'));
        }
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $categories = Category::findOrFail($id);
        $name = $request->name;
        $description = $request->description;
 
        $categories->name = $name;
        $categories->description = $description;
        $data = $categories->save();
        if ($data) {
            session()->flash('success', 'Categoria Atualizada com Sucesso');
            return redirect(route('adminCategories.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminCategories.update'));
        }
    }
}

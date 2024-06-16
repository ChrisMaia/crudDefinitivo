<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        $produtos = Product::with('category')->get();
        return view('admin.product.home', compact(['products', 'total']));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
        
    }

    public function store(Request $request){
        $validation = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Produto Adicionado com Sucesso');
            return redirect(route('adminProducts.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminProducts.create'));
        }
    }

    public function edit($id){
        $products = Product::findOrFail($id);
        $categories = Category::all();
      
        return view('admin.product.update', compact('products', 'categories'));
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Produto Deletado com Sucesso');
            return redirect(route('adminProducts.index'));
        } else {
            session()->flash('error', 'Produto Não Deletado com Sucesso');
            return redirect(route('adminProducts.index'));
        }
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);
        
        $products = Product::findOrFail($id);
        $title = $request->title;
        $category_id = $request->category_id;
        $price = $request->price;
 
        $products->title = $title;
        $products->category_id = $category_id;
        $products->price = $price;
        $data = $products->save();
        if ($data) {
            session()->flash('success', 'Produto Atualizado com Sucesso');
            return redirect(route('adminProducts.index'));
        } else {
            session()->flash('error', 'Ocorreu algum problema');
            return redirect(route('adminProducts.update'));
        }
    }
}

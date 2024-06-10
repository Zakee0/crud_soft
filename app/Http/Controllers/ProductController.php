<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;


use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{

    public function boot()
{
    Paginator::useBootstrap();
}
    //
    function index(){
        $products = Product::paginate(3);
        return view('products.index',["products"=>$products]);
    }
    function create(){
        return view('products.create');
    }

    function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $newproduct = Product::create($data);

        // return redirect()->back();
        return redirect(route('products.index'));
    }

    public function edit(Product $product){

        return view('products.edit',["product"=>$product]);
    }

    public function update(Product $product, Request $request){

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $product->update($data);
        return redirect(route('products.index'))->with('Success','Product updated succesfully');

    }

    public function delete(Product $product){

        $product->delete();
        return redirect(route('products.index'))->with('Success','Product deleted succesfully');

    }
}

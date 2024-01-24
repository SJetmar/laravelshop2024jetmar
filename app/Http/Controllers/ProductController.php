<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        //return view('products.index');
        return view('products.index', [
            'products'=> Product::get()
        ]);
    }
    
    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        //dump and die
        //dd($request->all());

        //validation
        $request->validate([
           'name' => 'required',
           'description' => 'required',
           'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        //upload image
        $imageName = time() . '.' . $request->image->extension();
        //dd($imageName);
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        //dd($product);
        
        $product->save();
        return back()->withSuccess('Produkt byl vytvořen.');




    }

    public function edit($id) {
        //dd($id);
        $product = Product::where('id',$id)->first();

        return view('products.edit',['product'=> $product]);
    }





    public function update(Request $request,$id) {
        //dump and die
        //dd($request->all());

        //validation
        $request->validate([
           'name' => 'required',
           'description' => 'required',
           'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        //tady je změna oproti metodě store
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
        //upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $product->image = $imageName;
    }

       
       
        $product->name = $request->name;
        $product->description = $request->description;
        //dd($product);
        
        $product->save();
        return back()->withSuccess('Produkt byl aktualizován.');

    
    }
    public function destroy($id) {
        $product = Product::where('id',$id)-> first();
        $product->delete();
        return back()->withSuccess('Produkt vymazán.');
    }
    
    public function show($id) {
        $product = Product::where('id',$id)-> first();
        return view('products.show',['product'=>$product]);
        
    }

}


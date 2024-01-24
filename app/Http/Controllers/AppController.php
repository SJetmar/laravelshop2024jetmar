<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy("name",'ASC') -> get();
        $categories =Category::orderBy("name","ASC") -> get();
        return view('index', ['brands'=>$brands, 'categories'=>$categories]);
    }
}

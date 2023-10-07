<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $data = Product::all();
        return view('home',compact('data'));
    }

    public function allProducts($id){
        $data = Product::find($id);
        return compact('data');
    }
}

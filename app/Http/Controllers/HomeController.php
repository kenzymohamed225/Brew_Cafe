<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $items = Product::all(); 
        
        
        return view('home', compact('items'));
    }
}
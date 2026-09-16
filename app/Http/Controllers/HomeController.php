<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Product::all();
        $galleryHighlights = Gallery::active()->latest()->take(4)->get();
        
        return view('home', compact('items', 'galleryHighlights'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
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

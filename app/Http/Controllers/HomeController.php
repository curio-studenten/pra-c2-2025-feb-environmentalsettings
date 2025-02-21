<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class HomeController extends Controller
{
    public function index() {
        $naam = 'HIGASHIKATA JOSUKEEEE, DOOOORARARARARARARARARA'; // Naam definiëren
        $brands = Brand::all()->sortBy('name'); // Alle brands ophalen
        $manuals = Manual::orderBy('views_count', 'desc')->limit(10)->get();
        return view('pages.homepage', [
            'naam' => $naam,
            'brands' => $brands, // Brands doorgeven aan de view
            'manuals' => $manuals
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryAbillity;
use App\Models\Abillity;
class HomeController extends Controller
{
    public function index(Request $request){
        $categoriesAbillity = CategoryAbillity::with('abillities')->get();
        return view('home', compact('categoriesAbillity'));
    }
}

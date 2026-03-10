<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryAbillity;
use App\Models\Abillity;
use App\Models\ProjectCategory;
use App\Models\Project;
class HomeController extends Controller
{
    public function index(Request $request){
        $categoriesAbillity = CategoryAbillity::with('abillities')->get();
        $categoriesProject  = ProjectCategory::all();
        $projects           = Project::with(['category', 'tags'])->get();
        return view('home', compact('categoriesAbillity', 'categoriesProject', 'projects'));
    }
}

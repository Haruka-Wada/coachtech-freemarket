<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sell() {
        $conditions = Condition::all();
        $categories = Category::all();
        return view('sell', compact('conditions', 'categories'));
    }
}

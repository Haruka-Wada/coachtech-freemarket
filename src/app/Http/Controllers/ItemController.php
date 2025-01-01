<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register() {
        return view('register');
    }

    public function sell() {
        $conditions = Condition::all();
        return view('sell', compact('conditions'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function mylist() {
        $items = Item::all();
        return view('mylist', compact('items'));
    }

    public function detail(Request $request) {
        $item = Item::find($request->item_id);
        return view('detail', compact('item'));
    }

    public function purchase(Request $request) {
        $item = Item::find($request->item_id);
        return view('purchase', compact('item'));
    }

    public function sell() {
        $conditions = Condition::all();
        $categories = Category::all();
        return view('sell', compact('conditions', 'categories'));
    }
}

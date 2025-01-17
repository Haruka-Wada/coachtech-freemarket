<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index() {
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function mylist() {
        $favorites = Favorite::where('user_id', Auth::id())->get();
        return view('mylist', compact('favorites'));
    }

    public function detail(Request $request) {
        $item = Item::withCount('favorite')->find($request->item_id);
        return view('detail', compact('item'));
    }

    public function purchase(Request $request) {
        $item = Item::find($request->item_id);
        return view('purchase', compact('item'));
    }

    public function favorite(Request $request) {
        $user_id = Auth::id();
        $item_id = $request->item_id;
        $already_liked = Favorite::where('user_id', $user_id)->where('item_id', $item_id)->first();

        if(!$already_liked) {
            $favorite = Favorite::create([
                'user_id' => $user_id,
                'item_id' => $item_id
            ]);
        }else{
            $already_liked->delete();
        }

        $favorite_counter = Item::withCount('favorite')->find($item_id)->favorite_count;
        $param = [
            'item_favorite_count' => $favorite_counter
        ];

        return response()->json($param);
    }

    public function mypage() {
        $items = Item::all();
        $sell_items = Item::where('user_id', Auth::id())->get();
        return view('mypage', compact('items', 'sell_items'));
    }

    public function sell() {
        $conditions = Condition::all();
        $categories = Category::all();
        return view('sell', compact('conditions', 'categories'));
    }

    public function store(Request $request) {
        $image = $request->file('image');
        $path = $image->store('image', 'public');
        $full_path = asset('storage/' . $path);

        $item = Item::create([
            'condition_id' => $request->condition_id,
            'name' => $request->name,
            'image' => $full_path,
            'brand' => $request->brand,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        $item->categories()->sync($request->category_ids);

        return redirect('/mypage');
    }
}

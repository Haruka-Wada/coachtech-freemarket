<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function address(Request $request) {
        $item_id = $request->item_id;
        return view('auth.address', compact('item_id'));
    }

    public function update(Request $request) {
        $user = User::find(Auth::id());
        $user->update([
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building
        ]);
        $item_id = $request->item_id;
        return redirect(route('item.purchase', [
            'item_id' => $item_id
        ]));
    }
}

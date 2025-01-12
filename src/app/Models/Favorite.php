<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item_id'];
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function alreadyLiked($user_id, $item_id) {
        return $this->where('user_id', $user_id)->where('item_id', $item_id)->first();
    }

}

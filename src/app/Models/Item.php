<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'condition_id', 'brand', 'price', 'description', 'is_purchased'];
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function condition() {
        return $this->belongsTo('App\Models\Category');
    }
}

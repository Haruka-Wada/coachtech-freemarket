<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $guarded = ['id'];

    public function items() {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }
}

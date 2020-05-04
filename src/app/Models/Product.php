<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'slug', 'price', 'category_id', 'description', 'quantity', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

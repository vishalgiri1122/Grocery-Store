<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    // function brand(){
    //     return $this->belongsTo(Brand::class, 'brand_id');
    // }
    // function size(){
    //     return $this->belongsTo(Size::class, 'size_id');
    // }
    // function color(){
    //     return $this->belongsTo(Color::class, 'color_id');
    // }
    // public function color()
    // {
    //     // Define a custom accessor for the 'color' relationship
    //     return $this->hasMany(Color::class, 'id', 'color_id');
    // }

    // Define an accessor method to retrieve related colors as a collection
    // public function getColorAttribute()
    // {
    //     $colorIds = explode(',', $this->color_id);
    //     // Use the 'whereIn' query to retrieve related colors
    //     return Color::whereIn('id', $colorIds)->get();
    // }
}

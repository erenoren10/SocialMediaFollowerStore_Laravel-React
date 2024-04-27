<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
    public function product_favorites()
    {
        return $this->hasMany(myFavorite::class,'product_id','id');
    }
    
}

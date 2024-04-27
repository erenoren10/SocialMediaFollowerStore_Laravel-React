<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['product_category_name', 'parent_id'];

    public function parentCategories()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }
    public function subCategories()
    {
        return $this->belongsTo(ProductCategory::class,'parent_id')->with('parentCategories');
    }

}
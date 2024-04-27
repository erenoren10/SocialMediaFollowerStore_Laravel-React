<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myFavorite extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function favoritedetails(){
        return $this->hasMany(User::class, 'id','user_id');
    }

    public function favoriteproducts(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}

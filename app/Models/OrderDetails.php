<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $primaryKey = "order_details_id";

    protected $fillable = [
        'order_details_id',
        'order_id',
        'product_id',
        'quantity',    
        'platform_username',  
        'adSoyad',
        'mail',  
        'telefon',
        'vergiNo',
        'VergiDaire',
        'FaturaAdresi',

    ];


    public function price(){
        return $this->hasMany(Product::class, "id","product_id");
    }
    public function ordercart(){
        return $this->hasMany(Order::class, "order_id","order_id");
    }



}

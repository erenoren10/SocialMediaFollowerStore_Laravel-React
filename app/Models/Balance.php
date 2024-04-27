<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';

    protected $fillable = [
        'user_id',
        'balance',
    ];

    public function userbalance()
    {
        return $this->hasMany(User::class,"id","user_id");
    }
}

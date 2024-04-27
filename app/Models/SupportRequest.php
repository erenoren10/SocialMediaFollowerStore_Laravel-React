<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details(){
        return $this->hasMany(SupportRequestDetails::class, "request_id","request_id");
    }

    public function userdetails(){
        return $this->hasMany(user::class, "id","user_id");
    }
}

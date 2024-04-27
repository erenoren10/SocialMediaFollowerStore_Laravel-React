<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
        'company_name',
        'tax_number',
        'billing_address',
        'profile_photo',
        'user_parent_id',
        'user_code',
       

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->id === 1;
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            Balance::create([
                'user_id' => $user->id,
                'balance' => 0.00,
            ]);

            Cart::create([
                'user_id' => $user->id,
                'code' => Str::random(8),
            ]);
        });
    }
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo ? asset('assets/img' . $this->profile_photo) : asset('user.jpg');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'user_parent_id');

    }
    public function child()
    {
        return $this->hasMany(User::class, 'user_parent_id')->with('child');

    }
    public function balances()
    {
        return $this->hasMany(Balance::class,"user_id","id");
    }




}

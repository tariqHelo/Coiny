<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'password',
        'type'
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

    public function transactions(){
        return $this->hasOne(Transaction::class);
    }

    public function expense(){
        return $this->hasMany(Expenses::class);
    }

    public function assets(){
        return $this->hasMany(Assets::class);
    }

    public function expensesTransactions(){
        return $this->expense()->sum('amount');
    }

    public function revenuesTransactions(){
        return $this->transactions()->sum('total');
    }

    public function assetsResult(){
        return $this->assets()->sum('value');
    }

    public function NetIncome(){
       return $this->revenuesTransactions() - $this->expensesTransactions(); 
    }

    public function totalWealth(){
       return $this->revenuesTransactions() + $this->assetsResult(); 
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    use HasFactory;

      protected $fillable = [
        'name',
        'address',
        'total_balance',
        'user_id'
    ];
     
     
    /**
    * Get the user that owns the ExpensesRevenues
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function accounts()
    {
        return $this->hasMany(BankAccounts::class);
    }

    public function totalAccounts(){
        return $this->accounts()->sum('amount');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

      protected $fillable = [
            'currency',
            'amount',
            'bank_id',
            'type',
    ];
     
     

    /**
    * Get the user that owns the ExpensesRevenues
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
       return $this->belongsTo(User::class)->select('name');
    }

     public function bank()
    {
        return $this->belongsTo(Banks::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

     protected $fillable = [
        'total',
        'type',
        'user_id',
    ];

    /**
    * Get the user that owns the ExpensesRevenues
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function total(){
        
    }
}

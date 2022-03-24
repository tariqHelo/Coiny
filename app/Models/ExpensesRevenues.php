<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesRevenues extends Model
{
    use HasFactory;

    protected $fillable = [
            'amount',
            'note',
            'type',
            'user_id',
            'category_id' 
    ];
       
   /**
    * Get the user that owns the ExpensesRevenues
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class)->select('name');
    }
    
    /**
    * Get the user that owns the ExpensesRevenues
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category(): BelongsTo
    {
       return $this->belongsTo(Category::class)->select('name');
    } 
   
    public function total()
    {
        return $this->sum('amount');
    }
}

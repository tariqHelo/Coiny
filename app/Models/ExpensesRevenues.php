<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesRevenues extends Model
{
    use HasFactory;
    
    protected $table = ['expenses_revenues'];
    
    protected $fillable = [
            'amount',
            'note',
            'type',
            'user_id',
            'category_id' 
    ]; 
   /**
    * Get the user that owns the Expenses
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
       return $this->belongsTo(User::class)->select('name');
    }
    
    /**
    * Get the user that owns the ExpensesRevenues
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category()
    {
       return $this->belongsTo(Category::class)->select('name');
    } 
}

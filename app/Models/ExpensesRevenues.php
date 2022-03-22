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
       
    public function user()
    {
        return $this->belongsTo(User::class)->select('name');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('name');
    }

    public function total()
    {
        return $this->sum('amount');
    }
}

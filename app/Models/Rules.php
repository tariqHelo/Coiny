<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;

     protected $fillable = [
        'icon',
        'amount',
        'category_id',
         'note',
        'type',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

     protected $fillable = [
        'icon',
        'name',
        'useful_life',
         'depreciation',
        'value',
        'user_id',
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

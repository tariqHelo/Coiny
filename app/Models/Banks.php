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
     
     
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

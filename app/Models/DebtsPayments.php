<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtsPayments extends Model
{
    use HasFactory;

     protected $fillable = [
            'amount',
            'debt_id',
            'date' 
    ]; 
}

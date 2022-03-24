<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     protected $fillable = [
        'icon',
        'name',
        'user_id'
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


    public function getImageUrlAttribute()
    {
        if (!$this->icon) {
            return asset('images/placeholder.png');
        }
        if (stripos($this->icon, 'http') === 0) {
            return $this->icon;
        }
        return asset('uploads/' . $this->icon);
    }

}

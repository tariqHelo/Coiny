<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccounts extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id','user_id'];

    public function childs()
    {
        return $this->hasMany(ChartOfAccounts::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ChartOfAccounts::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

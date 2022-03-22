<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

   protected $fillable = [
        'name',
        'email',
        'birthdate',
        'password',
        'username',
        'city',
        'description',
        'image',
        'online',
        'status',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

      public function setImageAttribute($image)
    {
        if (!$image) {
            return;
        }
        $this->deleteImage();
        if (gettype($image) != 'string') {
            $image->store('admins');
            $this->attributes['image'] = $image->hashName();
        } else {
            $this->attributes['image'] = $image;
        }
    }

    public function deleteImage()
    {
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            Storage::delete('users/' . $this->attributes['image']);
        }
    }

    public function getImageAttribute($image)
    {
        return $image ? Storage::url('users/' . $image) : null;
    }
}

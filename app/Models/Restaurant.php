<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_restaurant',
        'slug',
        'p_iva',
        'website',
        'address',
        'phone_number',
        'email',
        'cover_image',
        'original_name',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function user():HasOne{
        return $this->hasOne(User::class);
    }

}
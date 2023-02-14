<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'cover_image',
        'orginal_name',
        'ingredients',
        'is_available'
    ];

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}

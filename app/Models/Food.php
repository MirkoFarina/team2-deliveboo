<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = [
        'name',
        'restaurant_id',
        'price',
        'cover_image',
        'orginal_name',
        'ingredients',
        'is_available'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function scopeFilterFood(Builder $query, $order_id){


        /* $order_foods = Album::whereHas('authors', function ($query) use ($id) {
            $query->where('authors.id', $id);
        })
            ->with(['authors.contributions'=>function($query)use($albumId){
            $query->wherePivot('album_id',albumId);}])
            ->get();

        return $albums; */
    }

}

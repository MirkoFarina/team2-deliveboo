<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'total_amount',
        'checked'
    ];

    public function foods(){
        return $this->belongsToMany(Food::class);
    }

    public function scopeFilter(Builder $query, Collection $foods){

        $temp = array();
        foreach($foods as $food)
            array_push($temp, $food->id);

        return $query->where("food_order.food_id", "=", implode(',', $temp))
                ->leftJoin("food_order", function ($join) {
                    $join->on("orders.id", "=", "food_order.order_id");
                });
    }

}

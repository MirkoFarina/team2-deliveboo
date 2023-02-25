<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* CONTROLLARE AUTENTIFICAZIONE UTENTE */


        /*
        $col = collect();
        foreach ($foods as $food)
        $col->push(($food->orders)->all());
        return view('admin.orders.index', compact('col')); */



        /* $orders = collect();
        foreach($foods as $food){
        $orders->push(Order::whereHas('foods', function(Builder $query) use ($food){
        $query->where('food_id', $food->id);
        })->distinct()->first());
        }
        dd($orders); */


        /*    Order::rightJoin('foods', 'foods.id', '=', 'food_id')
        ->select('users.name', 'city.city_name')
        ->get();
        $orders = Order::all()
        ->leftJoin($foods, "countries.id", "=", "users.country_id")
        ->get(); */

      /*   Order::leftJoin('food_order', function ($join) use ($storeID) {
            $join->on('orders.id', '=', 'food_order.customer_id');
        })
            ->whereNotNull('pivot.store_id') //Not Null Filter
            ->get();

        Customers::leftJoin('pivot', function ($join) use ($storeID) {
            $join->on('customers.id', '=', 'pivot.customer_id')
                ->where('pivot.store_id', '=', $storeID);
        })
            ->whereNotNull('pivot.store_id') //Not Null Filter
            ->get(); */

        /*
            SELECT *
                FROM `orders`
                LEFT JOIN `food_order`
                ON `orders`.`id` = `food_order`.`order_id`
                WHERE `food_order`.`food_id` = [15,16,17,18];
        */
/*
        $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();

        $orders = DB::table("orders")
        ->leftJoin("food_order", function($join){
            $join->on("orders.id", "=", "food_order.order_id")
        })
        ->get();     */

        /* $orders = DB::table("orders")
        ->leftJoin("food_order", function($join){
            $join->on("orders.id", "=", "food_order.order_id");
        })
            ->distinct()->get(); */
            //$orders = Order::filter($foods)->get();
            //dd(Food::find(15)->orders);

            $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();


            $orders = collect();
            foreach($foods as $food){
                $orders->push($food->orders);
            }

            dd($orders);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

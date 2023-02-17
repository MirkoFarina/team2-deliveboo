<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();
        $orders = [];
        foreach ($foods as $food)
        array_push($orders, $food->orders->all());
        $orders = array_filter($orders);
        $col = collect($orders);
        dump($col);
        return view('admin.orders.index', compact('orders'));
        */

        $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();

        $col = collect();
        foreach ($foods as $food)
            $col->push(($food->orders)->all());

        return view('admin.orders.index', compact('col'));


        /* $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();

        $orders = [];
        foreach($foods as $food){
            dump($food->orders->all());
            array_push($orders, $food->orders->all());
        }
        $col = collect($orders);
        dump($col);
 */

        /* $col = collect(1);
        dump($col->all()); */
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

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
        /* AGGIUNGERE AUTENTIFICAZIONE UTENTE */

        $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();
        $orders = Order::filterOrders($foods)->get();
        return view('admin.orders.index', compact('orders'));
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
    public function show(Order $order)
    {
        /* AGGIUSTARE AUTENTIFICAZIONE UTENTE ? */

        $temp_foods = $order->foods;
        if($temp_foods[0]->restaurant_id !== Restaurant::where('user_id', Auth::user()->id)->first()->id)
            return redirect()->route('admin.order.index')->with('denied', 'ACCESSO NEGATO');
        else{
            $foods = collect();
            foreach($temp_foods as $food)
                $foods->push($food->getOriginal());

            //dd($temp_foods, $foods);
            return view('admin.orders.show', compact('order', 'foods'));

        }
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

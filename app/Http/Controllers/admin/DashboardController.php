<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getStat ()
    {

        $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();
        $orders = Order::filterOrders($foods)->orderBy('created_at', 'desc')->get();


        $orders_month = [];


        foreach($orders as $order) {
            $order_month_year = $order->created_at->format('F/Y');

            if(array_key_exists($order_month_year, $orders_month)){
                $orders_month[$order_month_year] ++;
            } else {
                $orders_month += [$order_month_year => 1];
            }
        }
        return view('admin.dashboard', compact('orders_month'));
    }
}

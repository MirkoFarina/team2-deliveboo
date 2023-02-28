<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function getStat()
    {
        $foods = Food::where('restaurant_id', Restaurant::where('user_id', Auth::id())->first()->id)->get();
        $orders = Order::filterOrders($foods)->orderBy('created_at', 'asc')->get();

        if (sizeof($orders) !== 0) {

            $orders_month = [];
            foreach ($orders as $order) {
                $order_month_year = $order->created_at->format('F/Y');

                if (array_key_exists($order_month_year, $orders_month)) {
                    $orders_month[$order_month_year]++;
                } else {
                    $orders_month += [$order_month_year => 1];
                }
            }
            $monthRevenue = $this->getMonthRevenue($orders);
            $totalRevenue = $this->getTotalRevenue($orders);
            $nCurrentOrders = $this->getCountCurrentOrders($orders);
            $nTotalOrders = $this->getCountTotalOrders($orders);
            $mostPopularFood = $this->getPopularFood($orders);
            return view('admin.statics.index', compact('orders_month', 'totalRevenue', 'monthRevenue', 'nCurrentOrders', 'nTotalOrders', 'mostPopularFood'));
        } else
            return view('admin.statics.index');
    }

    function getMonthRevenue($orders)
    {
        $current_month = date('F', strtotime(now()));
        $sum = 0;

        foreach ($orders as $order) {
            if ($current_month === date('F', strtotime($order->created_at)))
                $sum += $order->total_amount;
        }

        return $sum;
    }

    function getTotalRevenue($orders)
    {
        $sum = 0;

        foreach ($orders as $order) {
            $sum += $order->total_amount;
        }

        return $sum;
    }

    function getCountCurrentOrders($orders)
    {
        $current_month = date('F', strtotime(now()));
        $count = 0;

        foreach ($orders as $order) {
            if ($current_month === date('F', strtotime($order->created_at)))
                $count++;
        }

        return $count;
    }

    function getCountTotalOrders($orders)
    {
        return sizeof($orders);
    }

    function getPopularFood($orders)
    {
        $temp = array();
        foreach ($orders as $order) {
            $foods = $order->foods;
            foreach ($foods as $food) {
                if ($this->isIncluded($food->getOriginal()['id'], $temp) === -1)
                    array_push($temp, $food->getOriginal());
                else
                    $temp[$this->isIncluded($food->getOriginal()['id'], $temp)]['pivot_quantity'] += $food->getOriginal()['pivot_quantity'];
            }
        }

        $popular = $temp[0];
        foreach ($temp as $food)
            if ($food['pivot_quantity'] > $popular['pivot_quantity'])
                $popular = $food;

        return $popular;
    }

    function isIncluded($x, $arr)
    {
        $res = -1;
        for ($i = 0; $i < sizeof($arr); $i++) {
            if ($arr[$i]['id'] === $x)
                $res = $i;
        }
        return $res;
    }
}

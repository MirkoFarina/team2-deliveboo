<?php

namespace App\Http\Controllers\Api;

use App\Helpers\GlobalHelpers;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;

use Illuminate\Http\Request;

class RestaurantApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with(['categories'])->get();

        /* da sistemare */
        foreach($restaurants->all() as $res){
            if($res->cover_image !== null)
                $res = GlobalHelpers::adjustImage($res);
        }

        return response()->json(compact('restaurants'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with(['categories', 'foods'])->get();

        foreach($restaurant->all() as $res){
            if($res->cover_image !== null)
                $res = GlobalHelpers::adjustImage($res);

                foreach($res->foods as $food)
                    $food = GlobalHelpers::adjustImage($food);
        }
        return response()->json(compact('restaurant'));
    }


}

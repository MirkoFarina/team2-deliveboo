<?php

namespace App\Http\Controllers\admin;

use App\Helpers\GlobalHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();



        return view('admin.restaurants.index', compact('restaurant'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Restaurant::where('user_id', Auth::user()->id)->get();
        if(!empty($res->all()))
            dump(Auth::user()->name, 'Hai già un ristorante');
        else
            return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $data = $request->all();
        $new_res = new Restaurant();
        $new_res->fill($data);
        $new_res->user_id = Auth::user()->id;
        $new_res->slug = GlobalHelpers::generateSlug($new_res->name_of_restaurant, $new_res);

        if (array_key_exists('cover_image', $data)) {
            $data['original_name'] = $request->file('cover_image')->getClientOriginalName();
            $data['cover_image'] = Storage::put('uploads', $data['cover_image']);
        }

        $new_res->save();

        return redirect()->route('admin.restaurants.index');
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
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->all();

        if($data['name_of_restaurant'] != $restaurant->name_of_restaurant)
            $data['slug'] = GlobalHelpers::generateSlug($data['name_of_restaurant'], $restaurant);

            if (array_key_exists('cover_image', $data)) {

                if ($restaurant->cover_image) {
                    Storage::disk('public')->delete($restaurant->cover_image);
                }

                $data['original_name'] = $request->file('cover_image')->getClientOriginalName();
                $data['cover_image'] = Storage::put('uploads', $data['cover_image']);
            }

        $restaurant->update($data);
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant '. $restaurant->name_of_restaurant  . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->cover_image) {
            Storage::disk('public')->delete($restaurant->cover_image);
        }

        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('success', 'Hai eliminato correttamente il tuo ristorante');
    }
}

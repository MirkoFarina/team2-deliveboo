<?php

namespace App\Http\Controllers\admin;

use App\Helpers\GlobalHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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

        // SE IL RISTORANTE NON ESISTE CATEGORIES DIVENTA NULL E NON ESEGUE IL CONTROLLO
        if(is_null($restaurant)) {
            $categories = null;
        }else {
            $categories = $restaurant->categories()->get();
        }

        return view('admin.restaurants.index', compact('restaurant', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Restaurant::where('user_id', Auth::user()->id)->get();
        if (!empty($res->all()))
            dump(Auth::user()->name, 'Hai già un ristorante');
        else{
            $categories = Category::all();
            return view('admin.restaurants.create', compact('categories'));
        }
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
        $data['slug'] = GlobalHelpers::generateSlug($data['name_of_restaurant'], $new_res);
        $data['user_id'] = Auth::user()->id;
        $data['original_name'] = $request->file('cover_image')->getClientOriginalName();
        $data['cover_image'] = Storage::put('uploads', $data['cover_image']);
        $new_res = Restaurant::create($data);
        if (array_key_exists('categories', $data))
            $new_res->categories()->attach($data['categories']);

        return redirect()->route('admin.restaurants.index')->with('success', 'Il tuo ristorante è stato creato con successo');
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
        $categories = Category::all();
        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
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

        if ($data['name_of_restaurant'] != $restaurant->name_of_restaurant)
            $data['slug'] = GlobalHelpers::generateSlug($data['name_of_restaurant'], $restaurant);

        if (array_key_exists('cover_image', $data)) {

            if ($restaurant->cover_image) {
                Storage::disk('public')->delete($restaurant->cover_image);
            }

            $data['original_name'] = $request->file('cover_image')->getClientOriginalName();
            $data['cover_image'] = Storage::put('uploads', $data['cover_image']);
        }

        if (array_key_exists('categories', $data))
            $restaurant->categories()->sync($data['categories']);
        else
            $restaurant->categories()->detach();

        $restaurant->update($data);
        return redirect()->route('admin.restaurants.index')->with('success', 'Restaurant ' . $restaurant->name_of_restaurant . ' modificato con successo');
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

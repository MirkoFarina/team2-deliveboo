<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();

        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $form_data = $request->all();
        // GESTIONE IMAGGINI
        $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
        $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);

        // ASSEGNO L'ID DELL'UTENTE LOGGATO AL PIATTO
        $form_data['restaurant_id'] = Auth::id();

        $new_food = Food::create($form_data);

        return redirect()->route('admin.food.show', $new_food)->with('create', 'Piatto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Food $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, Food $food)
    {
        $form_data = $request->all();
        if(array_key_exists('cover_image', $form_data)){
            if($food->cover_image) {
                Storage::disk('public')->delete($food->cover_image);
            }
            $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);
        }

        $form_data['restaurant_id'] = Auth::id();

        $food->update($form_data);
        return redirect()->route('admin.food.edit', compact('food'))->with('edit', "$food->name è stato modificato corretamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Food $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('admin.food.index')->with('delete', 'Il tuo piatto è stato eliminato correttamente');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodCreateRequest;
use App\Http\Requests\FoodRequest;
use App\Models\Food;
use App\Models\Restaurant;
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
        $res_id = Restaurant::where('user_id', Auth::id())->first()->id;
        $foods = Food::where('restaurant_id', $res_id)->paginate(10);
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
    public function store(FoodCreateRequest $request)
    {
        $form_data = $request->all();
        // GESTIONE IMAGGINI
        $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
        $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);

        // ASSEGNO L'ID DELL'UTENTE LOGGATO AL PIATTO
        $form_data['restaurant_id'] = Restaurant::where('user_id', Auth::id())->first()->id;

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
        if (!$this->checkAuthFood($food))
            return redirect()->route('admin.food.index')->with('denied', 'ACCESSO NEGATO, le operazioni che puoi svolgere sono relative soltanto al tuo account.');
        else
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
        if (!$this->checkAuthFood($food))
            return redirect()->route('admin.food.index')->with('denied', 'ACCESSO NEGATO, le operazioni che puoi svolgere sono relative soltanto al tuo account.');
        else
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
        if (!$this->checkAuthFood($food))
            return redirect()->route('admin.food.index')->with('denied', 'ACCESSO NEGATO, le operazioni che puoi svolgere sono relative soltanto al tuo account.');
        else {

            $form_data = $request->all();
            //GESTISTO LE IMMAGINI
            if (array_key_exists('cover_image', $form_data)) {
                if ($food->cover_image) {
                    Storage::disk('public')->delete($food->cover_image);
                }
                $form_data['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
                $form_data['cover_image'] = Storage::put('uploads', $form_data['cover_image']);
            }

            // ASSEGNO L'ID RESTAURANT
            $form_data['restaurant_id'] = Restaurant::where('user_id', Auth::id())->first()->id;

            $food->update($form_data);
            return redirect()->route('admin.food.show', compact('food'))->with('edit', "$food->name è stato modificato corretamente");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Food $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if (!$this->checkAuthFood($food))
            return redirect()->route('admin.food.index')->with('denied', 'ACCESSO NEGATO, le operazioni che puoi svolgere sono relative soltanto al tuo account.');
        else {
            if ($food->cover_image)
                Storage::disk('public')->delete($food->cover_image);

            $food->delete();

            return redirect()->route('admin.food.index')->with('delete', 'Il tuo piatto è stato eliminato correttamente');
        }
    }

    private function checkAuthFood(Food $food)
    {
        return ($food->restaurant_id === Restaurant::where('user_id', Auth::user()->id)->first()->id) ? true : false;
    }


}

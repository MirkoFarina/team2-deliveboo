<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        if(Auth::getIdRestaurant())
            $res = Restaurant::where('user_id', Auth::id())->first();
        else $res = null;

        return view('admin.users.index', compact('user','res'));
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name'     => ['required', 'string', 'max:45'],
            'surname'  => ['required', 'string', 'max:45'],
            'address'  => ['required', 'string', 'max:45'],
            'number'   => ['required', 'string', 'max:10'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'address'       => $request->address,
            'phone_number'  => $request->number,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /* public function show($id){
        //implementare un admin
        if(Auth::id() !== $id){
            return redirect()->route('')->with('denied', 'Accesso negato');
        }

        // eliminare il passaggio di password e altri campi superflui
        $user = User::find($id);
        return view('', compact('user'));
    }
    public function edit(User $user){
        if(Auth::id() !== $user->id){
            return redirect()->route('')->with('denied', 'Accesso negato');
        }

        return view('', compact('user'));
    }

    public function update(ProfileUpdateRequest $request,  User $user){

    } */

}
